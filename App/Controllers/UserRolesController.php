<?php  
class UserRolesController extends Role{
    public function index(){
        if(can("editRoles")){
            $new = new Role();
            $data = $new->roles();

            // $data = array($user,$roles);
            return view("Admin/menageRoles.php",$data);
        }else{
            header("location:505");
        }
    } 

    public function create()
    {
        extract($_POST);
        if(isset($_POST['addRole'])){
            if($newrole = $this->newRole($role,$default)){
                header("location:menageRoles?s-message=Role is Successfully Created");
            }else{
                echo "failed";
            }
        }
    }
    public function show()
    {
        $id = $_POST['id'];
        $data = $this->getRole($id);
        return view("Admin/includes/editRole.php",$data);
    }

    public function viewdelete()
    {   
        $id = $_POST['id'];
        $data = $this->getRole($id);
        return view("Admin/includes/daleteRole.php",$data);
    }

    public function deleteRole()
    {   
        
        $delete = $this->deleteRoleData();
        if(isset($_POST['deleteRole'])){
            if($delete){
                header("location:menageRoles?s-message=Role is Successfully Deleted");
            }else{
                header("location:menageRoles?e-message=failed to Deleted");
            }
        }
        // return view("Admin/includes/daleteRole.php",$data);
    }
}