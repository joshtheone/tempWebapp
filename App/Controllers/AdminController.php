<?php
class AdminController extends connect
{
    public function adminpanel()
    {
        Admin();

        // var_dump(USER);
        return view("Admin/dashboard.php", USER);
    }

    public function users()
    {
        Admin();
        if (can("editUser")) {
            $user = new User();
            $data = $user->Alluser();
            return view("Admin/users.php", $data);
        }else{
            header("location:505");
        }
    }
}
