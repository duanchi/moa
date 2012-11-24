<?php
/**
 * funciton get_constant
 * 获取ini中定义的const并定义
 * @param unknown_type $config
 */
function get_constant($config = array()) {
	foreach ($config as $k => $v) define($k, $v);
}