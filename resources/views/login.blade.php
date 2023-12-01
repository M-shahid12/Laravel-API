<h1>User Login</h1>
<form action="user" method="POST">
    @csrf
<input type="text" name="user" placeholder="enter user name "><br><br>
<input type="passward" name="passward" placeholder="enter user passward "><br><br>
<button type="Submit">Login</button>
</form>