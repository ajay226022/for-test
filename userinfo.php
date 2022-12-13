<?php
require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');


class userinfo extends WP_List_Table
{
    public function prepare_items()
    {
        $datas = $this->list_table_data();
        $this->items = $datas;
        $columns = $this->get_columns();
        $this->_column_headers = array($columns);
    }
    public function get_columns()
    {
        $columns = array(
            "cb" => '<input type="checkbox" class=""/>',
            "ID" => "ID",
            "name" => "Name",
            "email" => "Email",
            "created_at" => "Date"
        );
        return $columns;
    }

    public function column_default($item, $columns)
    {
        // print_r($item);
        // die;
        switch ($columns) {
            case 'ID':
                return $item->ID;
                break;
            case 'name':
                return $item->display_name;
                break;
            case 'email':
                return $item->user_email;
                break;
            case 'created_at':
                return $item->user_registered;
            default:
                return "No List Found Value";
        }
    }
    // public function process_bulk_action()
    // {
    //     global $wpdb;

    //     $action = $this->current_action();

    //     switch ($action) {

    //         case 'delete':
    //             $query = $wpdb->delete('wp_userinfo_table', array('ID' => $_GET['id']));
    //             break;

    //         case 'edit':
    //             break;

    //         default:
    //             // do nothing or something else
    //             return;
    //             break;
    //     }

    //     return;
    // }
    public function list_table_data()
    {
        global $table_prefix, $wpdb;
        $table = $table_prefix . 'users';
        $all_datas = $wpdb->get_results("SELECT * FROM $table");
        // echo "<pre>";
        // print_r($all_datas);
        // die;
        return  $all_datas;
    }


    public function column_cb($items)
    {

        $top_checkbox = '<input type="checkbox" class="wlt-selected" />';
        return $top_checkbox;
    }
}
function data_list_table()
{
    $table = new userinfo();
    $table->prepare_items();
    $table->display();
}
data_list_table();
