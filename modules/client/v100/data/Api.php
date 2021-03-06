<?php
/**
 * Created by PhpStorm.
 * User: dd
 * Date: 5/26/15
 * Time: 23:41
 */
namespace app\modules\client\v100\data;

class Api
{
    const TYPE_USER = "user";
    const TYPE_ADMIN = "admin";
    const TYPE_DATA = 'Data';
    const TYPE_FFO = "FFO";
    const TYPE_COMMON = "common";
    const TYPE_POST = "post";
    const TYPE_ROLE = "role";
    const TYPE_SYNC = "sync";

    public static function PathGuestCanAccess()
    {
        return [
            'admin/login'
        ];
    }

    public static function ActionList()
    {

        $admin_actions = [
            [
                'type' => self::TYPE_ADMIN,
                'name' => 'admin - login',
                'action' => 'admin/login',
                'token' => false,
                'params' => ['username | s', 'password | s'],
                'response' => '\app\modules\client\v100\services\AdminService::login($username, $password)',
            ],
        ];
        
        $user_actions = [
            [
                'type' => self::TYPE_USER,
                'name' => 'user - login',
                'action' => 'user/login',
                'token' => false,
                'params' => ['username | s', 'password | s'],
                'response' => '\app\modules\client\v100\services\UserService::login($username, $password)',
            ],
        ];
        
        $contact_actions = [
            [
                'type' => self::TYPE_DATA,
                'name' => 'data - save',
                'action' => 'data/save',
                'token' => false,
                'params' => ['data_id | i, 0', 'name | s', 'price | i', 'rmb | i, 0', 'gold_value | i, 0', 'img | s, null', 'desc | s, null'],
                'response' => [
                    'data_id' => '\app\modules\client\v100\services\DataService::saveData($data_id, $name, $price, $rmb, $gold_value, $img, $desc)',
                ]
            ],

            [
                'type' => self::TYPE_DATA,
                'name' => 'data - list',
                'action' => 'data/list',
                'token' => false,
                'params' => ['page | i, 1', 'name | s, null', 'min_price | i, null', 'max_price | i, null'],
                'response' => '\app\modules\client\v100\services\DataService::dataList($page, $name, $min_price, $max_price)',
            ],
            
            [
                'type' => self::TYPE_DATA,
                'name' => 'data - detail',
                'action' => 'data/detail',
                'token' => false,
                'params' => ['data_id | i'],
                'response' => [
                    'detail' => '\app\modules\client\v100\services\DataService::detail($data_id)',
                ]    
            ],
            
            [
                'type' => self::TYPE_DATA,
                'name' => 'data - delete',
                'action' => 'data/delete',
                'token' => false,
                'params' => ['data_id | i'],
                'response' => '\app\modules\client\v100\services\DataService::deleteData($data_id)',
            ],
            
            [
                'type' => self::TYPE_DATA,
                'name' => 'data - delete Price',
                'action' => 'data/delete-item-price',
                'token' => false,
                'params' => ['item_price_id | i'],
                'response' => '\app\modules\client\v100\services\DataService::deleteItemPrice($item_price_id)',
            ],

            [
                'type' => self::TYPE_DATA,
                'name' => 'data - item Price List',
                'action' => 'data/price-list',
                'token' => false,
                'params' => ['item_id | i'],
                'response' => '\app\modules\client\v100\services\DataService::getItemPriceList($item_id)',
            ],

            [
                'type' => self::TYPE_DATA,
                'name' => 'data - item price save',
                'action' => 'data/save-item-price',
                'token' => false,
                'params' => ['item_id | i', 'price | i, null', 'rmb | i, null', 'gold_value | i, 0', 'img | s, null', 'desc | s, null'],
                'response' => '\app\modules\client\v100\services\DataService::saveItemPrice($item_id, $price, $rmb, $gold_value, $img, $desc)',
            ],
        ];
        
        $ffo_actions = [

            [
                'type' => self::TYPE_FFO,
                'name' => 'FFO - role list',
                'action' => 'ffo/role-list',
                'token' => false,
                'params' => ['page | i, 1', 'type | i, null', 'min_price | i, null', 'max_price | i, null'],
                'response' => '\app\modules\client\v100\services\FfoService::getRoleList($page, $type, $min_price, $max_price)',
            ],
            
            [
                'type' => self::TYPE_FFO,
                'name' => 'FFO - role save',
                'action' => 'ffo/role-save',
                'token' => false,
                'params' => ['item_id | s', 'name | s', 'type | i', 'avatar | s', 'price | i, 0', 'level | i, 0', 'add_time | s', 'comment | s, null'],
                'response' => '\app\modules\client\v100\services\FfoService::saveRole($item_id, $name, $type, $avatar, $price, $level, $add_time, $comment)',
            ],


            [
                'type' => self::TYPE_FFO,
                'name' => 'FFO - role delete',
                'action' => 'ffo/role-delete',
                'token' => false,
                'params' => ['id | i'],
                'response' => [
                    "null" => '\app\modules\client\v100\services\FfoService::deleteRole($id)',
                ]
            ],

            [
                'type' => self::TYPE_FFO,
                'name' => 'FFO - role detail',
                'action' => 'ffo/role-detail',
                'token' => false,
                'params' => ['id | i'],
                'response' => [
                    "role" => '\app\modules\client\v100\services\FfoService::getRoleDetail($id)',
                ]
            ],
            
            [
                'type' => self::TYPE_FFO,
                'name' => 'FFO - role img save',
                'action' => 'ffo/role-img-save',
                'token' => false,
                'params' => ['id | i', 'img | s'],
                'response' => [
                    "null" => '\app\modules\client\v100\services\FfoService::saveRoleImg($id, $img)',
                ]
            ],

            [
                'type' => self::TYPE_FFO,
                'name' => 'FFO - role data save',
                'action' => 'ffo/role-data-save',
                'token' => false,
                'params' => ['id | i', 'data | s'],
                'response' => [
                    "null" => '\app\modules\client\v100\services\FfoService::saveRoleData($id, $data)',
                ]
            ],
        ];
        
        $common_actions = [
              [
                  'type' => self::TYPE_COMMON,
                  'name' => 'common - send-phone',
                  'action' => 'common/phone-verification-code-send',
                  'token' => false,
                  'params' => ['phone | s'],
                  'response' => [
                      "null" => '\app\modules\client\v100\services\CommonService::sendPhoneVCode($phone)',
                  ]
              ]
        ];

        $post_actions = [
            [
                'type' => self::TYPE_POST,
                'name' => 'post - save',
                'action' => 'post/save',
                'token' => false,
                'params' => ['post_id | i, 0', 'title | s', 'content | s', "source | s"],
                'response' => [
                    "null" => '\app\modules\client\v100\services\PostService::savePost($post_id, $title, $content, $source)',
                ]
            ],

            [
                'type' => self::TYPE_POST,
                'name' => 'post - list',
                'action' => 'post/list',
                'token' => false,
                'params' => ['title | s, '],
                'response' => '\app\modules\client\v100\services\PostService::getPostList($title)',
            ],

            [
                'type' => self::TYPE_POST,
                'name' => 'post - delete',
                'action' => 'post/delete',
                'token' => false,
                'params' => ['post_id | i'],
                'response' => [
                    'null' => '\app\modules\client\v100\services\PostService::deletePost($post_id)',
                ]
            ],
        ];

        $role_actions = [

            [
                'type' => self::TYPE_ROLE,
                'name' => 'role - info',
                'action' => 'role/info',
                'token' => false,
                'params' => ['role_id | i'],
                'response' => '\app\modules\client\v100\services\RoleService::getRoleInfo($role_id)',
            ],
            
            [
                'type' => self::TYPE_ROLE,
                'name' => 'role - list',
                'action' => 'role/list',
                'token' => false,
                'params' => [],
                'response' => '\app\modules\client\v100\services\RoleService::getRoleList()',
            ],
            
            [
                'type' => self::TYPE_ROLE,
                'name' => 'role - save',
                'action' => 'role/save',
                'token' => false,
                'params' => ['role_id | i, 0', 'name | s'],
                'response' => [
                    'null' => '\app\modules\client\v100\services\RoleService::saveRole($role_id, $name)',
                ]
            ],

            [
                'type' => self::TYPE_ROLE,
                'name' => 'role - delete',
                'action' => 'role/delete',
                'token' => false,
                'params' => ['role_id | i'],
                'response' => [
                    'null' => '\app\modules\client\v100\services\RoleService::deleteRole($role_id)',
                ]
            ],
            
            [
                'type' => self::TYPE_ROLE,
                'name' => 'role - item price list',
                'action' => 'role/role-price-list',
                'token' => false,
                'params' => ['role_id | i'],
                'response' =>  '\app\modules\client\v100\services\RoleService::getRolePriceList($role_id)',
            ],

            [
                'type' => self::TYPE_ROLE,
                'name' => 'role - item price add',
                'action' => 'role/role-price-add',
                'token' => false,
                'params' => ['role_id | i', 'item_price_id | i'],
                'response' => [
                    'null' => '\app\modules\client\v100\services\RoleService::addRolePrice($role_id, $item_price_id)',
                ]
            ],

            [
                'type' => self::TYPE_ROLE,
                'name' => 'role - item price delete',
                'action' => 'role/role-price-delete',
                'token' => false,
                'params' => ['role_price_id | i'],
                'response' => [
                    'null' => '\app\modules\client\v100\services\RoleService::deleteRolePrice($role_price_id)',
                ]
            ],

            [
                'type' => self::TYPE_ROLE,
                'name' => 'role - item price comment save',
                'action' => 'role/role-price-comment-save',
                'token' => false,
                'params' => ['role_price_id | i', 'comment | s,'],
                'response' => [
                    'null' => '\app\modules\client\v100\services\RoleService::saveRolePriceComment($role_price_id, $comment)',
                ]
            ],
        ];

        $sync_actions = [
            [
                'type' => self::TYPE_SYNC,
                'name' => '酷游角色同步',
                'action' => 'sync/role-sync',
                'token' => false,
                'params' => ['role | s', 'data | s'],
                'response' => [
                    'null' => '\app\modules\client\v100\services\SyncService::roleSync($role, $data)',
                ]
            ],
        ];

        return array_merge($admin_actions, $user_actions, $contact_actions, $ffo_actions, $common_actions, $post_actions,
            $role_actions, $sync_actions);
    }


}