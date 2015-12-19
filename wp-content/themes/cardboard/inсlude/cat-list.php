<?
    $catsy = get_the_category();
    if($catsy) {
        $cat_id = $catsy[0]->cat_ID;
    } else {
        $cat_id = false;
    }
    $args = array(
        'current_category'   => $cat_id, // для подсветки категории
        'title_li' => '', // Убрать ненужный заголовок
        'depth' => 1,
        'child_of' => 3, // вывод из определенной категории
        'hide_empty' => false, // если св-ва не будет то по дефолту пустые категории не показываются
    );
?>
<ul class="aside-cats">
    <? wp_list_categories( $args ); ?>
</ul>