<?php

// консоль шаблона
 
$themename = "Настройки темы";
$shortname = "hr_newstheme";

$categories = get_categories('hide_empty=0&order_by=name');
        $wp_cats = array();
 
    foreach ($categories as $category_list){
        $wp_cats[$category_list -> cat_ID] = $category_list -> cat_name;
    }
 
array_unshift($wp_cats, "Выберите рубрику");

$options = array(
 
        array( "name" => "Настройки",
                "type" => "title" ),
 
        array ( "name" => "Основные настройки",
                "type" => "section" ),
        array ( "type" => "open"),
 
        array ( "name" => "Цветовая схема",
                "desc" => "Выберите цветовую схему темы",
                "id" => $shortname . "_color_scheme",
                "type" => "select",
                "options" => array ("синяя", "красная", "зеленая"),
                "std" => "blue" ),
 
        array ( "name" => "URL Логотипа",
                "desc" => "Введите ссылку к картинке логотипа",
                "id" => $shortname . "_logo",
                "type" => "text",
                "std" => "" ),
 
        array ( "name" => "Пользовательский CSS",
                "desc" => "Хотите использовать свой CSS-код? Вставьте его в это поле",
                "id" => $shortname . "_custom_css",
                "type" => "textarea",
                "std" => "" ),
         
        array ( "type" => "close"),
 
        array ( "name" => "Домашняя страница",
                "type" => "section" ),
 
        array ("type" => "open"),
 
        array ( "name" => "Картинка в шапке, на главной странице",
                "desc" => "Введите URL картинки, которая будет использоваться в шапке",
                "id" => $shortname ."_header_img",
                "type" => "text",
                "std" => ""),
 
         array ( "name" => "Рубрика домашней страницы",
                "desc" => "Выберите рубрику, в которую будут публиковатся записи",
                "id" => $shortname ."_feat_cat",
                "type" => "select",
                "options" => $wp_cats,
                "std" => "Выберите рубрику"),
         
        array ( "type" => "close"),
 
        array ( "name" => "Подвал",
                "type" => "section"),
 
        array ( "type" => "open"),
 
        array(  "name" => "Текст копирайта",
                "desc" => "Введите текст, который будет размещен в правой части подвала. Можно использовать HTML",
                "id" => $shortname."_footer_text",
                "type" => "text",
                "std" => ""),
 
        array(  "name" => "Код Google Analytics",
                "desc" => "Здесь вы можете разместить код Google Analytics, или любой другой счетчик",
                "id" => $shortname."_ga_code",
                "type" => "textarea",
                "std" => ""),
 
        array( "name" => "Favicon",
                "desc" => "Favicon - это пиксельная иконка, которая представляет ваш сайт. Вставьте URL к картинке с расширением .ico",
                "id" => $shortname."_favicon",
                "type" => "text",
                "std" => get_bloginfo('url') ."/favicon.ico"),
 
        array(  "name" => "Feedburner URL",
                "desc" => "Feedburner - это сервис Google, управляющий RSS-потоками. Paste your Feedburner URL here to let readers see it in your website",
                "id" => $shortname."_feedburner",
                "type" => "text",
                "std" => get_bloginfo('rss2_url')),
 
        array( "type" => "close")
 
    );
	//Эта функция используется как для обновления самих настроек
	function mytheme_add_admin(){
         
        global $themename, $shortname, $options;
         
        if($_GET['page'] == basename(__FILE__) ){
             
            if( 'saved' == $_REQUEST['action']){
                foreach ($options as $value){
                    update_option($value['id'], $_REQUEST[$value['id']]);
                }
 
                foreach ($options as $value){
                    if( isset ($_REQUEST[$value['id']]) ){
                        update_option($value['id'], $_REQUEST[$value['id']] );
                    }else{
                        delete_option($value['id']);
                    }
                }
                header("Location: admin.php?page=functions.php&saved=true");
                die;
            }
        }
 
        else if('reset' == $_REQUEST['action']){
            foreach($options as $value){
                delete_option($value['id']);
            }
 
            header("Location: admin.php&page=functions.php&reset=true");
 
            die;
        }
 
         add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'mytheme_admin');
    }
 
    function mytheme_add_init() {
       $file_dir = get_bloginfo('template_directory');
       wp_enqueue_style("functions", $file_dir."/functions/style.css", false, "1.0", "all");
       wp_enqueue_script("rm_script", $file_dir."/functions/script.js", false, "1.0");  
}
//
function mytheme_admin(){
        global $themename, $shortname, $options;
        $i = 0;
 
         if($_REQUEST['action'] == 'save')
    echo '<div id="message" class="updated fade"><p><strong> настройки темы '. $themename .' были сохранены</strong></p></div>';  
 
        if($_REQUEST['reset'])
            echo '<div id="message" class="updated fade"><p><strong> настройки темы '. $themename .' были сброшены</strong></p></div>';
    ?>
 
<div class="wrap rm_wrap">
    <h2>Настройки <?php echo $themename ?></h2>
 
    <div class="rm_opts">
        <form method="post">

<?php foreach($options as $value) {
                    switch ($value['type']){
                    case "open" :
             ?>
 
            <?php
                    break;
                    case "close" :
            ?>
 
            </div>
            </div>
            <br />
 
            <?php
                    break;
                    case "title" :
            ?>
 
            <p>Для более удобного управления темой <?php echo $themename;?>, вы можете использовать меню, расположенное ниже</p>
 
            <?php
                    break;
                    case "text" :
            ?>
 
            <div class="rm_input rm_text">
                <label for="<?php echo $value['id']?>">
                    <?php echo $value['name']?>
                </label>
 
                <input name="<?php echo $value['id']?>" id="<?php echo $value['id']?>" type="<?php echo $value['type']?>"
                       value="<?php if (get_settings($value['id']) != ""){ echo stripslashes(get_settings($value['id'])); } else {echo $value["std"];} ?>" />
 
                <small><?php echo $value['desc']; ?></small>
                <div class="clearfix"></div>
            </div>
 
             <?php
                    break;
                    case "textarea" :
            ?>
 
            <div class="rm_input rm_textarea">
                <label for="<?php echo $value['id']?>">
                    <?php echo $value['name']?>
                </label>
 
                <textarea name="<?php echo $value['id']?>" type="<?php echo $value['type']?>" >
                    <?php if (get_settings($value['id']) != ""){
                                echo stripslashes(get_settings($value['id']));
                          }else {
                                echo $value["std"];
                          }?>
                </textarea>
 
                <small><?php echo $value['desc']; ?></small>
                <div class="clearfix"></div>
            </div>
 
            <?php
                    break;
					//
					case "select" :
            ?>
 
            <div class="rm_input rm_select">
                 <label for="<?php echo $value['id']?>">
                    <?php echo $value['name']?>
                </label>
 
                <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                    <?php foreach ($value['options'] as $option) : ?>
                    <option <?php if(get_settings($value['id']) == $option){ echo "selected=selected";} ?>>
                        <?php echo $option; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
 
                 <small><?php echo $value['desc']; ?></small>
                 <div class="clearfix"></div>
            </div>
 
             <?php
                    break;
                    case "checkbox" :
            ?>
 
            <div class="rm_input rm_checkbox">
                <label for="<?php echo $value['id']?>">
                    <?php echo $value['name']?>
                </label>
 
                <?php if(get_options($value['id'])){
                        $checked = "checked=\"checked\"";
                    }else{
                        $checked = "";
                    }
                ?>
 
                <input type="checkbox" name="<?php echo $value['id']?>" id="<?php echo $value['id']?>" value="true" <?php echo $checked; ?> />
 
                <small><?php echo $value['desc']; ?></small>
                <div class="clearfix"></div>
            </div>
 
            <?php
                    break;
                    case "section" :
                    $i++;
            ?>
 
            <div class="rm_section">
                <div class="rm_title">
                    <h3>
                        <img src="<?php bloginfo('template_directory')?>/functions/images/trans.gif" class="inactive" alt=""/>
                        <?php echo $value['name']; ?>
                    </h3>
                     
                     <span class="submit">
                            <input name="save<?php echo $i; ?>" type="submit" value="Сохранить" />
                     </span>
                    <div class="clearfix"></div>
                </div>
 
                <div class="rm_options">
            <?php
                    break;
                    }
                }
            ?>
            <input type="hidden" name="action" value="save" />
        </form>
 
        <form method="post">
            <p class="submit">
                <input name="reset" type="submit" value="Сброс" />
                <input name="action" type="hidden" value="reset" />
            </p>
        </form>
 
        <div style="font-size:9px; margin-bottom:10px;">
            Иконки: <a href="http://www.woothemes.com/2009/09/woofunction/">WooFunction</a>
        </div>
</div>
 
  <?php  }
  //
  add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>