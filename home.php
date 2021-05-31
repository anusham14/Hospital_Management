<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />

    <title>Hospital Management System </title>
    <style>
        .grid-container {
        display: grid;
        grid-template-columns: auto auto auto;
        color: white;
        height : 250px;
        }
        .grid-container #gc1{
        background-color: #05BFBF;
        padding: 10%;
        font-size: 18px;
        text-align: center;
        }
        .grid-container #gc2{
        background-color: #05BFAD;
        padding: 10%;
        font-size: 18px;
        text-align: center;
        }
        .grid-container #gc3{
        background-color: #11C4A2;
        padding: 11%;
        font-size: 18px;
        text-align: center;
        }

    </style>

</head>
<body>
    
    <nav class="navbar navbar-light" style="background-color: white;">
         <div class="container-fluid">
         <a class="navbar-brand">APOLO HOSPITAL</a>
         
        </div>
    </nav> 

        
    <div>
        <img src="admin_panel.jpg" height="550px" width="100%">
        <div class="card-img-overlay text-dark" style="text-align:center ; margin-top:8%;">
            
            <h1 class="card-body" style="margin-top: 6%;"> We provide the best medical service here </h1>
            <h5>There's nothing more important than our good health - that's our principal capital asset.</h5>
            A customer is the most important visitor on our premises, he is not dependent on us. We are dependent on him. <br>
            He is not an interruption in our work. He is the purpose of it. He is not an outsider in our business.He is part of it.<br>
            We are not doing him a favor by serving him. He is doing us a favor by giving us an opportunity to do so.
            

        </div>
        
    </div>

    <div class="grid-container">
        <div class="grid-item" id="gc1">

            
            <i class="bi bi-person-circle"></i>
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
            

            <h3>Login <br> Doctor</h3>
            <a href= "doc_login.php">DOCTOR LOGIN</a><br>
            Looking forward towards <br>your best services!

        </div>


        <div class="grid-item" id="gc2">

    
            <i class="bi bi-person-circle"></i>
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
            

            <h3>Login <br>Patient</h3>
            <a href= "patient_login.php">PATIENT LOGIN</a><br>
            Thank you for trusting us!

        </div>


        <div class="grid-item" id="gc3">
            
            <i class="bi bi-person-circle"></i>
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
            <h3>Login Admin</h3>
            <a href= "admin_panel.php">ADMIN LOGIN</a><br>
            Hello admin!

        </div>  
    </div>  
</body>
</html>