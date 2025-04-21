<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Gym Membership</title>
    <link rel="stylesheet" href="membershipform.css"> 
    <script>
        function updateTotal() {
            const packagePrices = {
                "Starter": 9.99,
                "Standard": 16.99,
                "Elite": 24.99
            };

            const durationMultipliers = {
                "1_month": 1,
                "3_months": 3,
                "6_months": 6,
                "1_year": 12
            };

            const membershipType = document.getElementById("membership_type").value;
            const membershipDuration = document.getElementById("membership_duration").value;

            const basePrice = packagePrices[membershipType];
            const months = durationMultipliers[membershipDuration];
            const totalPrice = (basePrice * months).toFixed(2);

            document.getElementById("total_price").innerText = `$${totalPrice}`;
        }

        
        window.onload = updateTotal;
    </script>
</head>
<body>

        
   
<div class="membership-form-container">
    <h1>Purchase Gym Membership</h1>
    
    <form action="membershipconfirm.php" method="post">
       
        <div class="input-group">
            <label for="membership_type">Select Membership Package</label>
            <select name="membership_type" id="membership_type" onchange="updateTotal()" required>
                <option value="Starter">STARTER - $9.99/month + joining fee</option>
                <option value="Standard">STANDARD - $16.99/month + joining fee</option>
                <option value="Elite">ELITE - $24.99/month + joining fee</option>
            </select>
        </div>

       
        <div class="input-group">
            <label for="membership_duration">Duration</label>
            <select name="membership_duration" id="membership_duration" onchange="updateTotal()" required>
                <option value="1_month">1 Month</option>
                <option value="3_months">3 Months</option>
                <option value="6_months">6 Months</option>
                <option value="1_year">1 Year</option>
            </select>
        </div>

        <div class="input-group">
            <label>Total Price:</label>
            <span id="total_price">$0.00</span>
        </div>

       
        <h3>Payment Details</h3>
        <div class="input-group">
            <label for="card_number">Card Number</label>
            <input type="text" name="card_number" id="card_number" required placeholder="Enter card number" pattern="\d{16}" title="Please enter a 16-digit card number">
        </div>
        
        <div class="input-group">
            <label for="expiration_date">Expiration Date</label>
            <input type="month" name="expiration_date" id="expiration_date" required>
        </div>
        
        <div class="input-group">
            <label for="cvv">CVV</label>
            <input type="text" name="cvv" id="cvv" required placeholder="Enter CVV" pattern="\d{3}" title="Please enter a 3-digit CVV">
        </div>
        
      
        <button type="submit" name="purchase_membership">Purchase Membership</button>
    </form>
    <div class="navbar">
            <a href="membership.php">Cancel<i class='bx bx-x'></i></a>
            
           
        </div>
</div>
<script src="script.js"></script>
</body>
</html>