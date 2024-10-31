<?php
/*
Plugin Name: Remove more
Plugin URI: https://artemsannikov.ru/plugins/remove-more/
Description: В WordPress, при разделении записи с помощью тега "Далее" страница обрезается и ссылка на вторую часть поста имеет атрибут /#more. Плагин "Remove more" удаляет атрибут #more из ссылки.
Version: 1.0
Author: Artem Sannikov
Author URI: https://artemsannikov.ru
Donate link: https://artemsannikov.ru/donate/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/*
Copyright 2016  Artem Sannikov  (email : info@artemsannikov.ru)
 
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.
 
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function remove_more($link){
	$offset = strpos($link, '#more-');
	if($offset){
		$end = strpos($link, '"',$offset);
	}
	if($end){
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link','remove_more');

?>