<style>
     .menu-user{
        text-decoration: none;
        color: black;
        padding: 10px;
        width: 100%;
        border-bottom: 1px solid silver;
    }
    .menu-user:hover{
        background-color: silver;
    }
    .active{
        background-color: silver;
    }
</style>

<div style="100%;margin-top: 50px">
    <div style="width:100%; background-color: black; color: white;padding: 10px">
        <p>Profile</p>
    </div>
    <div style="width:100%; background-color: white; color: black;border: 1px solid black">
        <a href="profile.php" style="text-decoration: none; color: black;">
            <p class="menu-user">User Details</p></a>
        <a href="password.php" style="text-decoration: none; color: black;">
            <p class="menu-user"> Password Change</p></a>
        <a href="logout.php" style="text-decoration: none; color: black;">
            <p class="menu-user"> Logout</p></a>
    </div>
</div>
