<?php  
class EditUserController extends User{
    
   
    public function index(){
       
        $id=$_POST['id'];
        $user = $this->getUser($id);

        $roles = $this->roles($id);

       
        $all_roles = $this->Role()->All_roles();
        
        $data = array($user,$roles,$all_roles);
        return view("Admin/includes/editUser.php",$data);
    } 

    public function editUserRole(){
        $roles = $this->Role()->All_roles();
        $this->updateUserRole($roles);
        header("location:users?s-message=UserRole is Successfully Updated");
    }
}