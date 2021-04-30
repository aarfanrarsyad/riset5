<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Services;

class admin_model extends Model
{

    # SECTION USERS MODEL 

    protected function userValidation($id)
    {
        if (!isset($id)) return false;

        $user = $this->getUserById($id)->getRowArray();
        if (is_null($user)) return false;
        return $user;
    }

    protected function userGroupValidation($user_id, $group_id)
    {
        if (!isset($user_id) || !isset($group_id)) return false;

        $group = $this->check_user_group([$user_id, $group_id])->getRowArray();
        if (is_null($group)) return false;

        return $group;
    }

    /**
     * Get all user data that passes registration
     * 
     * @return mixed
     * @author RBAC Tim
     * 
     * checked
     */
    public function getAllUsers()
    {
        $query = "SELECT id,fullname,nim,email,created_at,updated_at,active FROM users";
        return $this->db->query($query);
    }

    /**
     * Get all user data that passes registration
     * 
     * @param int $id
     * @return mixed
     * @author RBAC Tim
     * 
     * checked
     */
    public function getUserById($id)
    {
        $query = "SELECT id,fullname,nim,email,created_at,updated_at,active FROM users WHERE id = $id";
        return $this->db->query($query);
    }

    /**
     * Update user
     * 
     * @param array|mixed $data
     * @return mixed
     * @author RBAC Tim 
     * 
     */
    public function updateUser($data)
    {
        if (empty($data) || !isset($data)) return redirect()->to(base_url('/admin'));

        $id = $data[0];
        $active = $data[1];
        $date =  get_date();

        //Validation User

    }

    /**
     * Enable or disable user based on user id
     * 
     * @param array|mixed $data
     * @return mixed
     * @author RBAC Tim 
     * 
     * checked
     */
    public function change_active_status($data)
    {
        if (empty($data) || !isset($data)) return redirect()->to(base_url('/admin'));

        $id = $data[0];
        $active = $data[1];
        $date =  get_date();

        //Validation User
        $user_data = $this->userValidation($id);
        if (!($user_data)) return false;
        if ($user_data['active'] == $active) return false;

        $desc = $active == 1 ? 'mengaktifkan user ' . ucwords($user_data['fullname']) :  'menonaktifkan user ' . ucwords($user_data['fullname']);

        $query = "UPDATE users SET active = $active, activate_hash=null, updated_at = '$date' WHERE id = $id";
        if ($this->db->query($query)) {
            activity_log(2, 1, ucfirst($desc), 1);
            return true;
        } else {
            activity_log(2, 1, 'Gagal ' . ($desc), 0);
            return false;
        }
    }

    /**
     * Delete users with specific ID
     * 
     * @param int $id
     * @return mixed
     * @author RBAC Tim
     * 
     * checked
     */
    public function deleteUserByid($id)
    {
        if (!isset($id)) return redirect()->to(base_url('/admin'));

        $user_data = $this->userValidation($id);
        if (!$user_data) return false;

        $desc = 'menghapus user ' . ucwords($user_data['fullname']);
        $query = "DELETE FROM users WHERE id= $id";
        if ($this->db->query($query)) {
            activity_log(3, 1, ucfirst($desc), 1);
            return true;
        } else {
            activity_log(3, 1, 'Gagal ' . ($desc), 0);
            return false;
        }
    }
    #------------------------------------------------------------------------------------

    #SECTION USERS GROUPS

    /**
     * Get group where id specified
     * 
     * @param int $id group id
     * @return mixed
     * @author RBAC Tim
     * 
     * Checked
     */
    public function getGroupById($id)
    {
        if (!isset($id) || !$id) return redirect()->to(base_url('/admin'));

        $query = "SELECT * FROM auth_groups WHERE id = $id";
        return $this->db->query($query);
    }

    /**
     * This method for update role/group
     * 
     * @param int $id
     * @return mixed]
     * @author RBAC Tim
     * 
     * Checked
     */
    public function createGroup($data)
    {
        if (!isset($data) || empty($data)) return redirect()->to(base_url('/admin'));

        $query = Services::authorization()->createGroup($data[0], $data[1]);
        $desc = 'menambahkan group/role ' . $data[0];

        if ($query) {
            activity_log(1, 6, ucfirst($desc), 1);
            return true;
        } else {
            activity_log(1, 6, 'Gagal ' . $desc, 0);
            return false;
        }
    }

    /**
     * This method for update role/group
     * 
     * @param int $id
     * @return mixed]
     * @author RBAC Tim
     * 
     * checked
     */
    public function updateGroup($data)
    {
        if (!isset($data) || empty($data)) return redirect()->to(base_url('/admin'));

        //Params Validation
        $group_data = $this->getGroupById($data[0])->getRowArray();
        if (!($group_data)) return false;
        if (!($data[1]) || empty($data[1])) return false;

        $desc = 'mengubah group "' . $group_data['name'] . '". Untuk ';
        if ($group_data['name'] == $data[1] && $group_data['description'] == $data[2]) return false;

        if ($group_data['name'] != $data[1]) $desc .= ' nama group "' . $group_data['name'] . '" menjadi "' . $data[1] . '", ';
        if ($group_data['description'] != $data[2]) $desc .= ' deskripsi "' . $group_data['description'] . '" menjadi "' . $data[2] . '".';
        $desc = substr(rtrim($desc), -0, strlen(trim($desc)) - 1) . '.';

        $query = Services::authorization()->updateGroup($data[0], $data[1], $data[2]);
        if ($query) {
            activity_log(2, 6, ucfirst($desc), 1);
            return true;
        } else {
            activity_log(2, 6, 'Gagal ' . $desc, 0);
            return false;
        }
    }

    /**
     * This method for delete role/group
     * 
     * @param int $id
     * @return mixed]
     * @author RBAC Tim
     * 
     * Checked
     */
    public function deleteGroup($id)
    {
        if (!isset($id) || !($id)) return redirect()->to(base_url('/admin'));

        //Params Validation
        $group_data = $this->getGroupById($id)->getRowArray();
        if (!$group_data) return false;
        $desc = 'menghapus group ' . $group_data['name'] . '.';
        $is_used = $this->getUsersGroupByGroupId($id)->getResultArray();
        if (!empty($is_used)) {
            $desc .= ' Group ini sedang digunakan oleh user "' . array_to_String($is_used, 2, 'fullname') . '"';
            activity_log(3, 6, 'Gagal ' . $desc, 0);
            return false;
        }

        $is_used_access = $this->getGroupAccessByGroup($id)->getResultArray();
        $used_access = array_values(array_map("unserialize", array_unique(array_map("serialize", $is_used_access))));
        if (!empty($used_access)) {
            $desc .= ' Grup ini memiliki akses untuk resource "' . array_to_String($used_access, 2, 'title') . '"';
            activity_log(3, 6, 'Gagal ' . $desc, 0);
            return false;
        }

        $authorize = Services::authorization();
        $query = $authorize->deleteGroup($id);

        if ($query) {
            activity_log(3, 6, ucfirst($desc), 1);
            return true;
        } else {
            activity_log(3, 6, 'Gagal ' . $desc, 0);
            return false;
        }
    }

    /**
     * This method is used to get users group based on a specific role id
     * 
     * @param int $id
     * @return mixed
     * @author by RBAC Tim
     * 
     * checked
     */
    public function getUsersGroupByGroupId($id)
    {
        if (!isset($id) || !$id) return redirect()->to(base_url('/admin'));

        $query = "SELECT auth_groups_users.*,users.fullname FROM auth_groups_users JOIN users ON auth_groups_users.user_id = users.id WHERE group_id = $id";
        return $this->db->query($query);
    }

    /**
     * This method is used to get a user role/group based on a specific user id
     * 
     * @param int $id
     * @return mixed
     * @author by RBAC Tim
     * 
     * checked
     */
    public function getUserGroupsByUserId($id)
    {
        if (!isset($id) || !$id) return redirect()->to(base_url('/admin'));

        $query = "SELECT auth_groups_users.* ,auth_groups.name
                    FROM auth_groups_users JOIN auth_groups
                    ON auth_groups_users.group_id = auth_groups.id 
                    WHERE auth_groups_users.user_id = $id";

        return $this->db->query($query);
    }

    /**
     * This method is used to get a user role/group based on a specific role/group id and user_id
     * 
     * @param mixed|array $data
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function check_user_group($data)
    {
        if (!isset($data) || empty($data)) return redirect()->to(base_url('/admin'));

        $user_id = $data[0];
        $group_id = $data[1];
        $query = "SELECT *
                    FROM auth_groups_users
                    WHERE auth_groups_users.user_id = $user_id AND auth_groups_users.group_id = $group_id";

        return $this->db->query($query);
    }


    /**
     * This method is used to add or remove user roles with a specific user id and a specific role id
     * 
     * @param mixed|array $data 
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function insert_user_group($data)
    {
        if (!isset($data) || empty($data)) return redirect()->to(base_url('/admin'));

        $user_id      = $data[0];
        $group_id     = $data[1];

        //Validation 
        $user_data = $this->userValidation($user_id);
        if (!$user_data) return false;

        $group_data = Services::authorization()->group($group_id);
        if (is_null($group_data)) return false;

        $username = $user_data['fullname'];
        $groupname = $group_data->name;

        if ($this->userGroupValidation($user_id, $group_id)) {
            $desc = 'menghapus role/group ' . $groupname . ' untuk user ' . $username;

            $query = "DELETE FROM auth_groups_users WHERE user_id = $user_id AND group_id = $group_id";
            if ($this->db->query($query)) {
                activity_log(3, 2, ucfirst($desc), 1);
                return ['delete', true];
            } else {
                activity_log(3, 2, 'Gagal ' . ($desc), 0);
                return ['delete', false];
            }
        } else {
            $desc = 'menambahkan role/group ' . $groupname . ' untuk user ' . $username;
            $query = "INSERT INTO auth_groups_users VALUES($group_id,$user_id)";
            if ($this->db->query($query)) {
                activity_log(1, 2, ucfirst($desc), 1);
                return ['add', true];
            } else {
                activity_log(1, 2, 'Gagal ' . ($desc), 0);
                return ['add', false];
            }
        }
    }

    #------------------------------------------------------------------------------------


    #SECTION RESOURCES AND MENUS

    /**
     * Get all system resources
     * 
     * @return mixed
     * @author RBAC Tim
     * 
     */
    public function getAllResources()
    {
        $query = "SELECT menu.*,submenu.* 
                    FROM menu 
                    JOIN submenu
                    ON menu.menu_id  = submenu.menu_id
                ";
        return $this->db->query($query);
    }

    /**
     * Get system resource by resource id
     * 
     * @param int $id
     * @return mixed
     * @author by RBAC Tim
     */
    public function getResourceById($id)
    {
        if (!isset($id)) return redirect()->to(base_url('/admin'));

        $query = "SELECT menu.*,submenu.* 
        FROM menu 
        JOIN submenu
        ON menu.menu_id  = submenu.menu_id
        WHERE submenu.submenu_id = $id
        ";
        return $this->db->query($query);
    }

    /**
     * This method is used to get all resources 
     *  based on a specific group id and a specific menu id / parent id
     * 
     * @param int $group_id
     * @param int $menu_id
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function getResourcesByRole($group_id, $menu_id)
    {
        if (!isset($group_id) || !isset($menu_id)) return redirect()->to(base_url('/admin'));

        $query = "SELECT submenu.*
                    FROM (((submenu JOIN menu ON submenu.menu_id  = menu.menu_id)
                    JOIN submenu_access ON submenu_access.submenu_id = submenu.submenu_id )
                    JOIN groups_access ON groups_access.menu_access_id = submenu_access.menu_access_id)
                    WHERE groups_access.group_id = $group_id AND submenu.menu_id = $menu_id AND submenu.active = 1
                    ORDER BY submenu.submenu_id ASC";
        return $this->db->query($query);
    }

    /**
     * This method is used to get system resources based on a specific URI segment
     * 
     * @param string $uri
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function getResourceByURI($uri)
    {
        if (!isset($uri)) return redirect()->to(base_url('/admin'));

        $query = "SELECT *
        FROM submenu
        WHERE title = '$uri' AND active = 1";
        return $this->db->query($query);
    }

    /**
     * Method for check whether a resource exists or not based on a spesific menu id
     * 
     * @param int $id
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function check_resource($id)
    {
        if (!isset($id)) return false;

        $query = "SELECT title FROM submenu WHERE menu_id = $id";
        return $this->db->query($query);
    }

    /**
     * This is for adding new resources
     * 
     * @param mixed|array $data
     * @return mixed
     * @author by RBAC Tim
     */
    public function insertNewResource($data)
    {
        if (!isset($data) || empty($data)) return redirect()->to(base_url('/admin'));

        $menu = $data['menu'];
        $title = $data['title'];
        $url = $data['url'];
        $icon = $data['icon'];
        $active = $data['active'];

        $desc = 'menambahkan resorce ' . $title;
        $query = "INSERT INTO submenu VALUES('',$menu,'$title', '$url','$icon','$active')";
        if ($this->db->query($query)) {
            activity_log(1, 3, ucfirst($desc), 1);
            return true;
        } else {
            activity_log(1, 3, 'Gagal ' . ($desc), 0);
            return false;
        }
    }

    /**
     * Method for adding a new menu
     * 
     * @param array|mixed $data
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function UpdateResource($data)
    {
        if (!isset($data) || empty($data)) return redirect()->to(base_url('/admin'));

        $id = $data['id'];
        $menu_id  = $data['menu'];
        $title = $data['title'];
        $url = $data['url'];
        $icon = $data['icon'];
        $active = $data['active'];

        $resource_data = $this->getResourceById($id)->getRowArray();
        if (is_null($resource_data)) return false;
        $menu_data = $this->getMenuById($menu_id)->getRowArray();
        if (is_null($menu_data)) return false;

        if ($resource_data['menu_id'] == $menu_id && $resource_data['title'] == $title && $resource_data['url'] == $url && $resource_data['icon'] == $icon && $resource_data['active'] == $active) return false;

        $previous_active_name =  $resource_data['active'] == 1 ? 'aktif' : 'nonaktif';
        $current_active_name =  $active == 1 ? 'aktif' : 'nonaktif';

        $desc = 'mengubah data resouce ' . $resource_data['title'] . '. Dari ';
        if ($resource_data['menu_id'] != $menu_id) $desc .= 'menu "' . $resource_data['menu_name'] . '" menjadi "' . $menu_data['menu_name'] . '", ';
        if ($resource_data['title'] != $title) $desc .= 'title "' . $resource_data['title'] . '" menjadi "' .  $title . '", ';
        if ($resource_data['url'] != $url) $desc .= 'URL "' . $resource_data['url'] . '" menjadi "' .  $url . '", ';
        if ($resource_data['icon'] != $icon) $desc .= 'icon "' . $resource_data['icon'] . '" menjadi "' .  $icon . '", ';
        if ($resource_data['active'] != $active) $desc .= 'status "' . $previous_active_name . '" menjadi "' .  $current_active_name . '", ';

        $desc = substr(rtrim($desc), -0, strlen(trim($desc)) - 1) . '.';

        $query = "UPDATE submenu SET menu_id = $menu_id ,title = '$title', url='$url',icon='$icon',active='$active' WHERE submenu_id = $id";
        if ($this->db->query($query)) {
            activity_log(2, 3, ucfirst($desc), 1);
            return true;
        } else {
            activity_log(2, 3, 'Gagal ' . ($desc), 0);
            return false;
        }
    }

    /**
     * This method to delete the resource based on resource id
     * 
     * @param int $id
     * @return bool
     * @author by RBAC Tim
     * 
     */
    public function deleteResourceByid($id)
    {
        if (!isset($id)) return false;

        $resource_data = $this->getResourceById($id)->getRowArray();
        if (is_null($resource_data)) return false;

        $desc = 'menghapus resorce ' . $resource_data['title'];
        $query = "DELETE FROM submenu WHERE submenu_id  = $id";
        if ($this->db->query($query)) {
            activity_log(3, 3, ucfirst($desc), 1);
            return true;
        } else {
            activity_log(3, 3, 'Gagal ' . ($desc), 0);
            return false;
        }
    }

    /**
     * Get all menu
     * 
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function getAllMenu()
    {
        $query = "SELECT *
                    FROM menu
                    ORDER BY menu_name ASC
                     ";
        return $this->db->query($query);
    }

    /**
     * Get menu by menu id
     * 
     * @param int $id
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function getMenuById($id)
    {
        $query = "SELECT *
                    FROM menu
                    WHERE menu_id = $id
                    ORDER BY menu_name ASC
                ";
        return $this->db->query($query);
    }

    /**
     * Method for adding a new menu
     * 
     * @param array|mixed $data
     * @return mixed
     * @author by RBAC Tim
     * 
     * Checked
     */
    public function insertMenu($data)
    {
        if (!isset($data) || empty($data)) return redirect()->to(base_url('/admin'));

        $menu = $data['menu'];
        $icon = $data['icon'];

        $desc = 'menambahkan menu ' . $menu;
        $query = "INSERT INTO menu VALUES('','$menu','$icon')";
        if ($this->db->query($query)) {
            activity_log(1, 3, ucfirst($desc), 1);
            return true;
        } else {
            activity_log(1, 3, 'Gagal ' . ($desc), 0);
            return false;
        }
    }

    /**
     * Method for updating a menu, based on the menu id
     * 
     * @param mixed|array $data
     * @return mixed
     * @author by RBAC Tim
     * 
     * checked
     */
    public function updateMenu($data)
    {
        if (!isset($data) || empty($data))  return redirect()->to(base_url('/admin'));

        $id = $data['id'];
        $menu = $data['menu'];
        $icon = $data['icon'];

        $menu_data = $this->getMenuById($id)->getRowArray();
        if (is_null($menu_data)) return false;
        if ($menu_data['menu_name'] == $menu && $menu_data['menu_icon'] == $icon) return false;

        $desc = 'mengupdate menu "' . $menu_data['menu_name'] . '". Untuk ';
        if ($menu_data['menu_name'] != $menu) $desc .= 'nama menu "' . $menu_data['menu_name'] . '" menjadi "' . $menu . '", ';
        if ($menu_data['menu_icon'] != $icon) $desc .= 'icon menu "' . $menu_data['menu_icon'] . '" menjadi "' . $icon . '", ';

        $desc = substr(rtrim($desc), -0, strlen(trim($desc)) - 1) . '.';
        $query = "UPDATE menu SET menu_name='$menu', menu_icon= '$icon' WHERE menu_id = $id";
        if ($this->db->query($query)) {
            activity_log(2, 3, ucfirst($desc), 1);
            return true;
        } else {
            activity_log(2, 3, 'Gagal ' . ($desc), 0);
            return false;
        }
    }

    /**
     * Method for deleting a menu, based on the menu id
     * 
     * @param int $id
     * @return mixed
     * @author by RBAC Tim
     */
    public function deleteMenuByid($id)
    {
        if (!isset($id)) return redirect()->to(base_url('/admin'));

        $menu_data = $this->getMenuById($id)->getRowArray();
        if (is_null($menu_data)) return false;

        $desc = 'menghapus menu ' . $menu_data['menu_name'] . '.';
        $submenu = $this->check_resource($id)->getResultArray();
        if (!empty($submenu)) {
            $submenu = array_to_string($submenu, 2, 'title');
            $desc .= ' Menu ini sedang digunakan oleh resource ' . $submenu;
            activity_log(3, 3, 'Gagal ' . $desc, 0);
            return $submenu;
        }

        $query = "DELETE FROM menu WHERE menu_id  = $id";
        if ($this->db->query($query)) {
            activity_log(3, 3, ucfirst($desc), 1);
            return true;
        } else {
            activity_log(3, 3, 'Gagal ' . $desc, 0);
            return false;
        }
    }

    #------------------------------------------------------------------------------------

    #SECTION ACCESS

    /**
     * This method to get all crud access
     * 
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function getAllCRUD()
    {
        $query = "SELECT * FROM crud";

        return $this->db->query($query);
    }

    /**
     * This method to get crud access by id crud
     * 
     * @param int $id
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function getCRUDbyId($id)
    {
        if (!isset($id)) return redirect()->to(base_url('/admin'));
        $query = "SELECT * FROM crud WHERE crud_id = $id";

        return $this->db->query($query);
    }

    /**
     * This method to get all CRUD access for the resource
     * 
     * @param int $id
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function getAccessResources($id)
    {
        if (!isset($id)) return redirect()->to(base_url('/admin'));

        $query = "SELECT *  FROM submenu_access WHERE submenu_id =$id";
        return $this->db->query($query);
    }

    /**
     * This method to get resource access for specific id
     * 
     * @param int $id
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function getAccessResourceById($id)
    {
        if (!isset($id)) return redirect()->to(base_url('/admin'));

        $query = "SELECT submenu.title, submenu.submenu_id, crud.crud_id,crud.crud_name FROM (submenu_access JOIN submenu ON submenu_access.submenu_id =  submenu.submenu_id) JOIN crud ON crud.crud_id =submenu_access.crud_id  WHERE menu_access_id =$id";
        return $this->db->query($query);
    }

    /**
     * This method is for checking if there is resource access for a specific resource id 
     *  and for a specific CRUD access
     * 
     * @param int $resource 
     * @param int $access 
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function checkStatusAccess($resource, $access)
    {
        if (!isset($resource) || !isset($access)) return redirect()->to(base_url('/admin'));

        $query = "SELECT * FROM submenu_access WHERE submenu_id = $resource AND crud_id = $access";
        return $this->db->query($query);
    }

    /**
     * This method is used to add CRUD access to each resource
     * 
     * @param mixed|array $data 
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function insert_access($data)
    {
        if (!isset($data) || empty($data)) return redirect()->to(base_url('/admin'));

        $resource      = $data[0];
        $access        = $data[1];

        $resource_data = $this->getResourceById($resource)->getRowArray();
        if (is_null($resource_data)) return false;
        $access_data = $this->getCRUDbyId($access)->getRowArray();
        if (is_null($access_data)) return false;

        if (!empty($this->checkStatusAccess($resource, $access)->getResultArray())) {
            $desc = 'menghapus access ' . $access_data['crud_name'] . ' untuk resource ' . $resource_data['title'] . '.';
            $query = "DELETE FROM submenu_access WHERE submenu_id = $resource AND crud_id = $access";
            if ($this->db->query($query)) {
                activity_log(3, 4, ucfirst($desc), 1);
                return ['delete', true];
            } else {
                activity_log(3, 4, 'Gagal ' . $desc, 0);
                return ['delete', false];
            }
        } else {
            $desc = 'menambahkan access ' . $access_data['crud_name'] . ' untuk resource ' . $resource_data['title'] . '.';
            $query = "INSERT INTO submenu_access VALUES('', $resource, $access)";
            if ($this->db->query($query)) {
                activity_log(1, 4, ucfirst($desc), 1);
                return ['insert', true];
            } else {
                activity_log(1, 4, 'Gagal ' . $desc, 0);
                return ['insert', false];
            }
        }
    }

    #-----------------------------------------------------------------------------------------------------------------------------


    #SECTION PERMISSIONS

    /**
     * This method is used to get all resource accesses 
     *  based on a specific group id and a specific resource id
     * 
     * @param int $group
     * @param int $access
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function groups_access($group, $access)
    {
        if (!isset($group) || !isset($access)) return redirect()->to(base_url('/admin'));

        $query = "SELECT submenu_access.*
                    FROM submenu_access JOIN groups_access 
                    ON submenu_access.menu_access_id = groups_access.menu_access_id
                    WHERE groups_access.group_id = $group AND submenu_access.submenu_id = $access";
        return $this->db->query($query);
    }

    /**
     * This method is used to get groups access where groups is define
     *  
     * 
     * @param int $group
     * @param int $access
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function getGroupAccessByGroup($group)
    {
        if (!isset($group) || !($group)) return redirect()->to(base_url('/admin'));

        $query = "SELECT submenu.title
                    FROM (groups_access JOIN submenu_access ON groups_access.menu_access_id  = submenu_access.menu_access_id)
                    JOIN submenu ON submenu.submenu_id = submenu_access.submenu_id
                    WHERE groups_access.group_id = $group LIMIT 20";
        return $this->db->query($query);
    }

    /**
     * This method is used to check group access with a specific group id 
     *  and a specific resource access id
     * 
     * @param int $group 
     * @param int $access 
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function checkRoleAccess($group, $access)
    {
        if (!isset($group) || !isset($access)) return redirect()->to(base_url('/admin'));

        $query = "SELECT * FROM groups_access WHERE group_id  = $group  AND menu_access_id = $access";
        return $this->db->query($query);
    }

    /**
     * This method is used to add or remove access or permissions for a specific role
     * 
     * @param mixed|array $data 
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function insert_permission($data)
    {
        if (!isset($data) || empty($data)) return redirect()->to(base_url('/admin'));

        $group      = $data[0];
        $access     = $data[1];

        $group_data = Services::authorization()->group($group);
        if (is_null($group_data)) return false;

        $resource_access = $this->getAccessResourceById($access)->getRowArray();
        if (is_null($resource_access)) return false;

        if (!empty($this->checkRoleAccess($group, $access)->getResultArray())) {
            $desc = 'menghapus access ' . $resource_access['crud_name'] . ' pada resource ' . $resource_access['title'] . ' untuk role ' . $group_data->name;
            $query = "DELETE FROM groups_access WHERE group_id = $group AND menu_access_id = $access";
            if ($this->db->query($query)) {
                activity_log(3, 5, ucfirst($desc), 1);
                return ['delete', true];
            } else {
                activity_log(3, 5, 'Gagal ' . $desc, 0);
                return ['delete', false];
            }
        } else {
            $desc = 'menambahkan access ' . $resource_access['crud_name'] . ' pada resource ' . $resource_access['title'] . ' untuk role ' . $group_data->name;
            $query = "INSERT INTO groups_access VALUES('',$group,$access)";
            if ($this->db->query($query)) {
                activity_log(1, 5, ucfirst($desc), 1);
                return ['add', true];
            } else {
                activity_log(1, 5, 'Gagal ' . $desc, 0);
                return ['add', false];
            }
        }
    }
    #-----------------------------------------------------------------------------------------------------------------------------

    #SECTION USER ATTEMPTS

    /**
     * This method is used to get all login attempts
     * 
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function login_attempts()
    {
        $query = "SELECT auth_logins.*,users.username, users.fullname FROM auth_logins LEFT JOIN users ON auth_logins.user_id = users.id";
        return $this->db->query($query);
    }

    /**
     * This method is used to get all user activation tokens
     * 
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function getActivationTokens()
    {
        $query = "SELECT fullname,email,activate_hash
        FROM users
        WHERE activate_hash !=''";

        return $this->db->query($query);
    }

    /**
     * This method is used to get all user resset tokens
     * 
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function getResetTokens()
    {
        $query = "SELECT fullname,email,reset_at,reset_hash,reset_expires
        FROM users
        WHERE reset_hash !=''";

        return $this->db->query($query);
    }

    /**
     * This method is used to obtain all password reset attempts
     * 
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function get_token_reset()
    {
        $query = "SELECT * FROM auth_reset_attempts";
        return $this->db->query($query);
    }

    /**
     * This method is used to get all account activation attempts
     * 
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function get_token_activation()
    {
        $query = "SELECT * FROM auth_activation_attempts";
        return $this->db->query($query);
    }
    #-----------------------------------------------------------------------------------------------------------------------------

    # SECTION ACTIVITY LOG

    /**
     * This method is used to get all user activity
     * 
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function activity_log()
    {
        $query = "SELECT * FROM activity_log JOIN table_scope ON activity_log.target_scope_id =table_scope.target_scope_id";
        return $this->db->query($query);
    }

    /**
     * This method is used to add certain user activities
     * 
     * @param mixed|array $data
     * @return mixed
     * @author by RBAC Tim
     * 
     */
    public function insert_activity($data)
    {
        if (!isset($data) || empty($data)) return redirect()->to(base_url('/admin'));

        $date = $data[0];
        $email = $data[1];
        $name_group = $data[2];
        $access = $data[3];
        $scope = $data[4];
        $desc = $data[5];
        $status = $data[6];

        $query = "INSERT INTO activity_log VALUES ('', '$date','$email','$name_group',$access,$scope,'$desc',$status)";
        return $this->db->query($query);
    }

    #-----------------------------------------------------------------------------------------------------------------------------

    public function getAllAlumni($id)
    {
        $query = "SELECT * FROM alumni 
            WHERE alumni.id_alumni=$id";
        return $this->db->query($query);
    }

    public function getAlumniById($id)
    {
        if (!isset($id)) return redirect()->to(base_url('/admin'));

        $query = "SELECT *
            FROM alumni 
            WHERE alumni.id_alumni = $id
            ";
        return $this->db->query($query);
    }

    public function deleteAlumniByid($id)
    {
        if (!isset($id)) return false;

        $alumni_data = $this->getAlumniById($id)->getRowArray();
        if (is_null($alumni_data)) return false;

        $desc = 'menghapus alumni ' . $alumni_data['nama'];
        $query = "DELETE FROM alumni WHERE id_alumni  = $id";
        if ($this->db->query($query)) {
            activity_log(3, 3, ucfirst($desc), 1);
            return true;
        } else {
            activity_log(3, 3, 'Gagal ' . ($desc), 0);
            return false;
        }
    }

    #-----------------------------------------------------------------------------------------------------------------------------

    public function getAllTempatKerja()
    {
        $query = "SELECT * FROM tempat_kerja";
        return $this->db->query($query);
    }

    public function getTempatKerja($id)
    {
        $query = "SELECT * FROM tempat_kerja WHERE tempat_kerja.id_tempat_kerja = $id";
        return $this->db->query($query);
    }

    public function searchInstansi($keyword)
    {
        return $this->table('tempat_kerja')->like('nama_instansi', $keyword)->orLike('alamat_instansi', $keyword);
    }

    public function getTempatKerjaById($id)
    {
        if (!isset($id)) return redirect()->to(base_url('/admin'));

        $query = "SELECT *
                FROM tempat_kerja 
                WHERE tempat_kerja.id_tempat_kerja = $id
                ";
        return $this->db->query($query);
    }

    public function deleteInstansiByid($id)
    {
        if (!isset($id)) return false;

        $instansi_data = $this->getTempatKerjaById($id)->getRowArray();
        if (is_null($instansi_data)) return false;

        $desc = 'menghapus instansi ' . $instansi_data['nama_instansi'];
        $query = "DELETE FROM tempat_kerja WHERE id_tempat_kerja  = $id";
        if ($this->db->query($query)) {
            activity_log(3, 3, ucfirst($desc), 1);
            return true;
        } else {
            activity_log(3, 3, 'Gagal ' . ($desc), 0);
            return false;
        }
    }

    #-----------------------------------------------------------------------------------------------------------------------------

    public function getAllPublikasi()
    {
        $query = "SELECT * FROM publikasi";
        return $this->db->query($query);
    }

    public function searchPublikasi($keyword)
    {
        return $this->table('publikasi')->like('publikasi', $keyword)->orLike('id_alumni', $keyword);
    }

    public function getPublikasiById($id)
    {
        if (!isset($id)) return redirect()->to(base_url('/admin'));

        $query = "SELECT *
            FROM publikasi 
            WHERE publikasi.id_alumni = $id
            ";
        return $this->db->query($query);
    }

    public function deletePublikasiByid($id)
    {
        if (!isset($id)) return false;

        $publikasi_data = $this->getPublikasiById($id)->getRowArray();
        if (is_null($publikasi_data)) return false;

        $desc = 'menghapus publikasi ' . $publikasi_data['publikasi'];
        $query = "DELETE FROM publikasi WHERE id_alumni   = $id";
        if ($this->db->query($query)) {
            activity_log(3, 3, ucfirst($desc), 1);
            return true;
        } else {
            activity_log(3, 3, 'Gagal ' . ($desc), 0);
            return false;
        }
    }

    #-----------------------------------------------------------------------------------------------------------------------------

    public function getAllPendidikan()
    {
        $query = "SELECT * FROM pendidikan";
        return $this->db->query($query);
    }

    public function searchPendidikan($keyword)
    {
        return $this->table('pendidikan')->like('instansi', $keyword)->orLike('jenjang', $keyword);
    }

    public function getPendidikanById($id)
    {
        if (!isset($id)) return redirect()->to(base_url('/admin'));

        $query = "SELECT *
            FROM pendidikan 
            WHERE pendidikan.id_pendidikan = $id
            ";
        return $this->db->query($query);
    }

    public function deletePendidikanByid($id)
    {
        if (!isset($id)) return false;

        $pendidikan_data = $this->getPendidikanById($id)->getRowArray();
        if (is_null($pendidikan_data)) return false;

        $desc = 'menghapus pendidikan ' . $pendidikan_data['jenjang'];
        $query = "DELETE FROM pendidikan WHERE id_pendidikan  = $id";
        if ($this->db->query($query)) {
            activity_log(3, 3, ucfirst($desc), 1);
            return true;
        } else {
            activity_log(3, 3, 'Gagal ' . ($desc), 0);
            return false;
        }
    }

    #-----------------------------------------------------------------------------------------------------------------------------

    public function getAllPendidikanTinggi()
    {
        $query = "SELECT * FROM pendidikan_tinggi";
        return $this->db->query($query);
    }

    public function searchPendidikanTinggi($keyword)
    {
        return $this->table('pendidikan_tinggi')->like('nim', $keyword)->orLike('program_studi', $keyword);
    }

    public function getPendidikanTinggiById($id)
    {
        if (!isset($id)) return redirect()->to(base_url('/admin'));

        $query = "SELECT *
            FROM pendidikan_tinggi
            WHERE pendidikan_tinggi.id_pendidikan = $id
            ";
        return $this->db->query($query);
    }

    public function deletePendidikanTinggiByid($id)
    {
        if (!isset($id)) return false;

        $pendidikantinggi_data = $this->getPendidikanTinggiById($id)->getRowArray();
        if (is_null($pendidikantinggi_data)) return false;

        $desc = 'menghapus pendidikan tinggi' . $pendidikantinggi_data['nim'];
        $query = "DELETE FROM pendidikan_tinggi WHERE id_pendidikan  = $id";
        if ($this->db->query($query)) {
            activity_log(3, 3, ucfirst($desc), 1);
            return true;
        } else {
            activity_log(3, 3, 'Gagal ' . ($desc), 0);
            return false;
        }
    }

    #-----------------------------------------------------------------------------------------------------------------------------

    public function getAllPrestasi()
    {
        $query = "SELECT * FROM prestasi";
        return $this->db->query($query);
    }

    public function searchPrestasi($keyword)
    {
        return $this->table('prestasi')->like('nama_prestasi', $keyword)->orLike('tahun_prestasi', $keyword);
    }

    public function getPrestasiById($id)
    {
        if (!isset($id)) return redirect()->to(base_url('/admin'));

        $query = "SELECT *
             FROM prestasi
             WHERE prestasi.id_prestasi = $id
             ";
        return $this->db->query($query);
    }

    public function deletePrestasiByid($id)
    {
        if (!isset($id)) return false;

        $prestasi_data = $this->getPrestasiById($id)->getRowArray();
        if (is_null($prestasi_data)) return false;

        $desc = 'menghapus prestasi' . $prestasi_data['nama_prestasi'];
        $query = "DELETE FROM prestasi WHERE id_prestasi  = $id";
        if ($this->db->query($query)) {
            activity_log(3, 3, ucfirst($desc), 1);
            return true;
        } else {
            activity_log(3, 3, 'Gagal ' . ($desc), 0);
            return false;
        }
    }
}
