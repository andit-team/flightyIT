<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Activity;
use App\Permission;
use App\Cms;
use Sentinel;
use Session;

class CmsHelper
{
    private $userId;
    public function __construct()
    {
        if (Sentinel::check()) {
            $this->userId = Sentinel::getUser()->id;
        }
    }

    
    public function drawCategoryTree($categories, $parentID = 0, $level = 0) {
        $output = '<ul>';
        if (isset($categories[$parentID]) && count($categories[$parentID])) {
            foreach ($categories[$parentID] as $cat) {
                $output .= "<li>" . $cat['title'];
                $output .= "<ul>";
                $output .= drawCategoryTree($categories, $cat['id'], $level + 1);
                $output .= "</ul></li>";
            }
        }
        $output .= '</ul>';
        return $output;
    }

    public function show_menu_tree($array, $curParent, $opt_id, $currLevel = 0, $prevLevel = -1) {
        $return = '';
        foreach ($array as $categoryId => $list) {
            if ($curParent == $list['parent_id']) {
                if ($list['parent_id'] == 0) {
                    $class = "dropdown list-unstyled";
                } else {
                    $class = "sub_menu";
                }
                if ($currLevel > $prevLevel) {
                    $return .= "<ul class='{$class}'>";
                }
                if ($currLevel == $prevLevel) {
                    $return .= '</li>';
                }
                $return .= '<li id="arrayorder_' . $list['id'] . '" class="pageslist" style="padding: 10px 0px;">
    <span id="menu_' . $list['id'] . '">' . $list['id'] . ' - ' . ($list['title']) . '</span>
    <span class="action pull-right">';
                $checked = ($list['is_login'] == 1) ? 'checked="checked"' : '';
                $return .= '<label class="checkbox"><input type="checkbox" onclick="isLoginMenuItem(' . $list['id'] . ');" id="login_' . $list['id'] . '" ' . $checked . '> Is Login </label>';
                $return .= '<span class="btn btn-xs btn-warning" onclick="updateMenuForm(' . $list['id'] . ',' . '\'' . $list['obj_id'] . '\'' . ');"> <i class="fa fa-edit"></i></span>
    <span class="btn btn-xs btn-danger" onclick="DeleteMenuItem(' . $list['id'] . ');"> <i class="fa fa-trash-o"></i></span>
    </span>
    </li>';
                if ($currLevel > $prevLevel) {
                    $prevLevel = $currLevel;
                }
                $currLevel++;
                show_menu_tree($array, $categoryId, $opt_id, $currLevel, $prevLevel);
                $currLevel--;
            }
        }
        if ($currLevel == $prevLevel)
            $return .= " </li> </ul> ";
        return $return;
    }

    public function countBannerPhotos($bannerID) {
        $CI = & get_instance();
        $sql = "SELECT count(*) as Row FROM `cms_content` WHERE parent_id = '$bannerID' and post_type='banner'";
        $query = $CI->db->query($sql);
        return $query->row()->Row;
    }

    public function get_banner_thumb($thumb = '') {
        if (!file_exists(BannerDir . $thumb)) {
            print '<img src="' . ImageResize . BannerFolder . 'no-thumb.gif&w=120px&h=100&zc=1" alt="Thumb"/>';
        } else {
            print '<img src="' . ImageResize . BannerFolder . $thumb . '&w=120px&h=100&zc=1" alt="Thumb"/>';
        }
    }

    public function get_total_slider($banner_id) {
        $CI = & get_instance();
        $sql = "SELECT COUNT(*) `Row` FROM `cms_content` WHERE `post_type` = 'banner' AND `parent_id` = '$banner_id'";
        $output = $CI->db->query($sql)->row()->Row;
        return $output;
    }

    public function showAvatar($type = 'no_image') {
        $CI = & get_instance();
        if ($type == 'no_image') {
            return base_url('asset/cms/img/avatar.png');
        }
        if ($type == 'male') {
            return base_url('asset/cms/img/avatar.png');
        }
        if ($type == 'female') {
            return base_url('asset/cms/img/avatar_female.png');
        }
    }

    public function cmsStatus($selected = 'Draft') {
        $status = ['Publish' => 'Publish', 'Draft' => 'Draft', 'Trash' => 'Trash'];
        return selectOptions($selected, $status);
    }

    public function getMenuOptionData($selected = 1) {
        $CI = & get_instance();
        $rows = $CI->db->get_where('cms_options', ['type' => 'menu'])->result();
        $options = '<option value="admin/cms/menu">--Please Select--</option>';
        foreach ($rows as $row) {
            $options .= "<option value=\"admin/cms/menu/?id={$row->id}\" ";
            $options .= ($row->id == $selected ) ? 'selected="selected"' : '';
            $options .= ">{$row->name}</option>";
        }
        return $options;
    }

    public function isCheckCMSPageAccess($access_array_data = array(), $access_key = 0) {
        if (in_array($access_key, $access_array_data)) {
            return 'checked="checked"';
        }
    }

    public function getPageTemplates($selected = '') {
        $folder = base_path() . '\resources\views\frontend\theme';
        echo $folder;
        if (!is_dir($folder)) {
            return false;
        }
        $templates = scandir($folder);
        $row = '';
        foreach ($templates as $template) {
            if (stripos($template, '.') > 0) {
                $template = substr($template, 0, -10);
                $row .= "<option value='{$template}'";
                $row .= ($selected == $template) ? ' selected="selected"' : '';
                $row .= '>' . ucfirst($template) . '</option>';
            }
        }
        return $row;
    }

    public function getCategoryTemplates($selected = '') {
        $folder = APPPATH . '/views/frontend/category_template/';
        if (!is_dir($folder)) {
            return false;
        }
        $templates = scandir($folder);
        foreach ($templates as $template) {
            if (stripos($template, '.') > 0) {
                $row .= "<option value='{$template}'";
                $row .= ($selected == $template) ? ' selected="selected"' : '';
                $row .= '>' . substr($template, 0, -4) . '</option>';
            }
        }
        return $row;
    }

    public function getPageTree($parent_id = 0) {
        // $ci = & get_instance();
        // $ci->db->select('id,post_title,parent_id');
        // $ci->db->from('cms');
        // $ci->db->where('post_type', 'page');
        // $ci->db->order_by('page_order', 'ASC');
        // $result = $ci->db->get()->result();

        $result = Cms::where('post_type','page')->orderBy('page_order','ASC')->get();
        $pages = array();
        foreach ($result as $page) {
            $pages[$page->parent_id][] = array(
                'id' => $page->id,
                'title' => $page->post_title,
                'parent_id' => $page->parent_id
            );
        }
        return $this->buildParentPageTree($pages, 0, 0, $parent_id);
    }

    public function buildParentPageTree($array_data, $parentID = 0, $level = 0, $selected = 0) {
        $output = '';
        if (isset($array_data[$parentID]) && count($array_data[$parentID])) {
            foreach ($array_data[$parentID] as $child) {
                $output .= '<option value="' . $child['id'] . '"';
                $output .= ($selected == $child['id']) ? ' selected="selected">' : '>';
                $output .= $this->bildPagentPageHelper($level);
                $output .= $child['title'];
                $output .= '</option>';
                $output .= $this->buildParentPageTree($array_data, $child['id'], $level + 1, $selected);
            }
        }
        return $output;
    }

    public function bildPagentPageHelper($label = 1) {
        if ($label == 1) {
            return '&nbsp;&nbsp;&nbsp;|_&nbsp;';
        } elseif ($label == 2) {
            return '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;|_&nbsp;';
        } elseif ($label == 3) {
            return '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;|_&nbsp;';
        } else {
            return '';
        }
    }
}