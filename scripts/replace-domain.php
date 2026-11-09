<?php
// Serialization-safe domain swap. Only needed if the site will NOT live at https://megsrichie.com.
// Usage (from the WordPress root): php scripts/replace-domain.php https://megsrichie.com https://new-domain.com
if (PHP_SAPI !== 'cli') exit;
require getcwd() . '/wp-load.php';
global $wpdb; [, $old, $new] = $argv;
function rep($v,$o,$n){
  if (is_string($v)) {
    if (is_serialized($v)) { $u=@unserialize($v,['allowed_classes'=>false]);
      if ($u!==false && strpos(print_r($u,true),'__PHP_Incomplete_Class')===false) return serialize(rep($u,$o,$n)); }
    return str_replace([$o,str_replace('/','\/',$o)],[$n,str_replace('/','\/',$n)],$v);
  }
  if (is_array($v)) { foreach($v as $k=>$x) $v[$k]=rep($x,$o,$n); return $v; }
  if (is_object($v) && !($v instanceof __PHP_Incomplete_Class)) { foreach($v as $k=>$x) $v->$k=rep($x,$o,$n); }
  return $v;
}
$host=parse_url($old,PHP_URL_HOST); $c=0;
foreach ([['posts','ID',['post_content','post_excerpt','guid']],['postmeta','meta_id',['meta_value']],['options','option_id',['option_value']],['usermeta','umeta_id',['meta_value']]] as [$t,$pk,$cols]) {
  $t=$wpdb->prefix.$t;
  $rows=$wpdb->get_results("SELECT $pk,".implode(',',$cols)." FROM $t WHERE ".implode(' OR ',array_map(fn($x)=>"$x LIKE '%$host%'",$cols)),ARRAY_A);
  foreach ($rows as $r) { $u=[]; foreach($cols as $x){ $nv=rep($r[$x],$old,$new); if($nv!==$r[$x]) $u[$x]=$nv; }
    if ($u) { $wpdb->update($t,$u,[$pk=>$r[$pk]]); $c++; } }
}
update_option('siteurl',$new); update_option('home',$new);
echo "Updated $c rows. Now regenerate Elementor CSS: Elementor > Tools > Regenerate CSS & Data.\n";
