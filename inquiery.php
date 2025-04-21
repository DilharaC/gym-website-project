<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="inquiery.css">
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header>
        <div class="navbar">
            <a href="membership.php">Cancel<i class='bx bx-x'></i></a>
            
           
        </div>
    </header>
    <section class="form" id="form">
        <div class="container">
            <form method="post" action="inquierydb.php">
            <div class="fullbox">
                <div class="topic">
                    <h1>JOIN FITZONE</h1>
                    <span>Interested in joining us? Fill in your details below to learn more </span>
                </div>
                <div class="input-group">
                    
                    <label>SUBJECT</label>
                    <input type="subject" name="subject" id="subject" placeholder="Subject" required>
                    
                </div>
                <div class="input-group">
                    <label>FULL NAME</label>
                   
                    <input type="fullName" name="fullName" id="fullName" placeholder="Full Name" required>
                </div>
                <div class="row">
                    <div class="input-group">
                        <label>COMPANY NAME</label>
                        <input type="cName" name="cName" id="cName" placeholder="Company Name" required>
                    </div>
                    <div class="input-group">
                        <label>EMAIL</label>
                        <input type="email" name="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="input-group">
                        <label>PHONE NUMBER</label>
                        <input type="phonenumber" name="phonenumber" id="phonenumber" placeholder="Phone Number" required>
                    </div>
                </div>
                
                 
                    <div class="input-group">
                        <label>I'M INTERESTED IN MEMPESHIP PLAN</label>
                        <input type="membership" name="membership" id="membership" placeholder="Membership Plan" required>
                    </div>

                    <div class="input-group">
                        <label>FITNESS GOALS</label>
                        <input type="fitnessgoals" name="fitnessgoals" id="fitnessgoals" placeholder="Fitness Goals" required>
                    </div>
                    
                    <br>
                    <input type="submit" class="btn" value="Submit" name="inquiry">
               
                   
               
            </div>
        </form>
        </div>
    </section>
</body>
</html>