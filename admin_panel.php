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

        .grid-container .regicon{
            background-color: rgba(0, 0, 0, 0.3);
            text-align: center;
            padding: 4%;
            margin-left: 40%;
            width: 20%;
            height: 35%;
            border-radius: 50%;
        }
    </style>

</head>
<body>
    
    <nav class="navbar navbar-light" style="background-color: white;">
         <div class="container-fluid">
         <a class="navbar-brand">APOLO HOSPITAL</a>
         <ul class="nav nav-pills">
                <li class="active">
                    <form method="get" action="display.php">
                    <button type="submit" class="btn btn-outline-primary" id="dbt" name="dbt">Doctors</button>
                    </form>
                </li>
                <li>
                    <form method="get" action="display_p.php">
                    <button type="submit" class="btn btn-outline-primary" id="pbt" name="pbt">Patients</button>
                    </form>
                </li>
                <li>
                    <form method="get" action="display_a.php">
                    <button type="submit" class="btn btn-outline-primary" id="abt" name="abt">Appointments </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav> 

    <?php


    ?>
        
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

            <div class="regicon">
                <i class="bi bi-person-plus"></i>
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                </svg>
            </div>

            <h3>Register <br> New Doctor</h3>
            <a href= "doc_register.php">DOCTOR REGISTER</a><br>
            It's whole new journey. <br>Welcome!

        </div>


        <div class="grid-item" id="gc2">

            <div class="regicon">
                <i class="bi bi-person-plus"></i>
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                </svg>
            </div>

            <h3>Register <br>New Patient</h3>
            <a href= "patient_register.php">PATIENT REGISTER</a><br>
            Thank you for trusting us!

        </div>


        <div class="grid-item" id="gc3">
            
            <i class="bi bi-person-circle"></i>
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
            </svg>
            <h3>Logout Admin</h3>
            <a href= "home.php">ADMIN LOGOUT</a><br>
            Hello admin!

        </div>  
    </div>  
</body>
</html>