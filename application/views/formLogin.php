<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        *{
    font-family: 'poppins', sans serif;
}
body{
    background-image: url('../penggajian/assets/img/c.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed;
}
.box{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 90vh;
    
}
.container{
    width: 350px;
    display: flex;
    flex-direction: column;
    padding: 0 15px 0 15px;
    border: 2px solid rgb(255,255,255,0.7);
}
span{
    color: #fff;
    font-size: small;
    display: flex;
    justify-content: center;
    padding: 10px 0 10px 0;
    margin-top: 20px;
}
header{
    color: #fff;
    font-size: 30px;
    display: flex;
    justify-content: center;
    padding: 10px 0 10px 0;
}
.input-field{
    display: flex;
    flex-direction: column;
    margin-top: 10px;
    color:  rgb(255,255,255,0.7);
}
.input{
    height: 45px;
    width: 100%;
    border:none;
    outline: none;
    border-radius: 30px;
    color: #fff;
    padding: 0 0 0 20px;
    background: rgb(255,255,255,0.1);
}
::-webkit-input-placeholder{
    color: #fff;
}
.submit{
    border: none;
    border-radius: 30px;
    font-size: 15px;
    outline: none;
    width: 100%;
    background: rgb(255,255,255,0.7);
    cursor: pointer;
    margin-top: 10px;
}
.submit:hover{
    box-shadow: 1px 5px 7px 1px rgba(0,0,0,0.2);
    text-decoration: none;
    color:black;
}
a{
    color: black;
    text-align: center;
    text-decoration: none;
    margin-bottom: 30px;
}

    </style>

</head>
<body>
    <form class="user" method="POST" action="<?php echo base_url('login') ?>">
                                        <?php echo $this->session->flashdata('pesan')?>
                                        
<div class="box">
    <div class="container">
        <div class="top-header">
            <span> CV GARASITRIFT</span>
            <header>Login</header>
        </div>
        <div class="input-field">
            <input type="text" class="input"
            id="exampleInputEmail" aria-describedby="emailHelp"
            placeholder="Username" name="username">
            <?php echo form_error('username','<div class="input-field"></div>')?>
        </div>
        <div class="input-field">
             <input type="password" class="input"
            id="exampleInputPassword" placeholder="Password" name="password">
            <?php echo form_error('password','<div class="input-field"></div>')?>
        </div>
        <div class="input-field">
        <button type="submit" class="submit">LOGIN</button>
        <a href="<?php echo base_url('welcome')?>" class="submit">Kembali ke landing</a>
        </form>
        </div>
    </div>
</div>
</body>
</html>