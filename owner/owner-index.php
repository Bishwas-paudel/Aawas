<?php 
session_start();
if(!isset($_SESSION["email"])){
  header("location:../owner-index.php");
}

include("navbar.php");
include("engine.php");

 ?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

 <div class="container-fluid">
  <ul class="nav nav-pills nav-justified">
    <li class="active" style="background-color: #FFF8DC"><a data-toggle="pill" href="#home">Profile</a></li>
    <li style="background-color: #FAC0E6"><a data-toggle="pill" href="#menu4">Messages</a></li>
    <li style="background-color: #FAF0E6"><a data-toggle="pill" href="#menu1">Add Property</a></li>
    <li style="background-color: #FFFACD"><a data-toggle="pill" href="#menu2">View Property</a></li>
    <li style="background-color: #FFFAF0"><a data-toggle="pill" href="#menu3">Update Property</a></li>
    <li style="background-color: #FAFAF0"><a data-toggle="pill" href="#menu6">Booked Property</a></li>
  </ul>


<!-- ---______________________________________________________________________oWNER PROFILE_________________________________________________________ -->
  <div class="tab-content">
  <div id="home" class="tab-pane fade in active">
      <center><h3>Owner Profile</h3></center>
      <div class="container">
      <?php 
        include("../connection/connection.php");
        $u_email= $_SESSION["email"];

        $sql="SELECT * from owner where email='$u_email'";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
      {
          while($rows=mysqli_fetch_assoc($result)){
          
       ?>
        <div class="card">
  <img src="../images/avatar.png" alt="John" style="height:200px; width: 100%">
  <h1><?php echo $rows['full_name']; ?></h1>
  <p class="title"><?php echo $rows['email']; ?></p>
  <p><b>Phone No.: </b><?php echo $rows['phone_no']; ?></p>
  <p><b>Address: </b><?php echo $rows['address']; ?></p>
  <p><b>Id Type: </b><?php echo $rows['id_type']; ?></p>
  <p><img src="../<?php echo $rows['id_photo']; ?>" height="100px"></p>

  <!-- Trigger the modal with a button -->
  <p><button type="button" class="btn btn-lg" data-toggle="modal" data-target="#myModal">Update Profile</button></p>


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Profile</h4>
        </div>
        <div class="modal-body">

            <form method="POST">
                <div class="form-group">
                  <label for="full_name">Full Name:</label>
                  <input type="hidden" value="<?php echo $rows['owner_id']; ?>" name="owner_id" >
                  <input type="text" class="form-control" id="full_name" value="<?php echo $rows['full_name']; ?>" name="full_name" required >
                </div>
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" value="<?php echo $rows['email']; ?>" name="email" readonly required>
                </div>
                <div class="form-group">
                  <label for="phone_no">Phone No.:</label>
                  <input type="text" class="form-control" id="phone_no" value="<?php echo $rows['phone_no']; ?>" name="phone_no" required>
                </div>
                <div class="form-group">
                  <label for="address">Address:</label>
                  <input type="text" class="form-control" id="address" value="<?php echo $rows['address']; ?>" name="address" required>
                </div>
                <div class="form-group">
      <label for="id_type">Type of ID:</label>
      <input type="text" class="form-control" value="<?php echo $rows['id_type']; ?>" name="id_type" readonly required>
    </div>
    <div class="form-group">
      <label>Your Id:</label><br>
      <img src="../images<?php echo $rows['id_photo']; ?>" id="output_image/" height="100px" readonly >
    </div>
                <hr>
                <center><button id="submit" name="owner_update" class="btn btn-primary btn-block">Update</button></center><br>
                
              </form>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</div>
    </div>
    </div>






<!-- _____________________________________________________________________MESSAGE SECTION_________________________________________________________ -->



    <div id="menu4" class="tab-pane fade">
      <div class="container">
      <center><h3>See Messages</h3></center>
            <?php 
      $owner_id=$rows['owner_id']; 
      $sql1="SELECT * FROM chat where owner_id='$owner_id' ";

    $query1 = mysqli_query($db,$sql1);

  if(mysqli_num_rows($query1)>0)
  {
    while($row= mysqli_fetch_assoc($query1)){

      $rental_id=$row['rental_id'];
      $sql2="SELECT * FROM rental where rental_id='$rental_id' ";

    $query2 = mysqli_query($db,$sql2);

  if(mysqli_num_rows($query2)>0)
  {
    while ($rows= mysqli_fetch_assoc($query2)){
    
?>

   
<link rel="stylesheet" type="text/css" href="message-style.css">

<div class="tab">   
  <button class="tablinks" id="defaultOpen" onmouseover="openCity(event, '<?php echo $rows["full_name"]; ?>')"><?php echo $rows["full_name"]; ?></button>
</div>

<div id="<?php echo $rows["full_name"]; ?>" class="tabcontent">
  <?php
   $sql3="SELECT * FROM chat where rental_id='$rental_id' AND owner_id='$owner_id' ";

    $query3 = mysqli_query($db,$sql3);

  if(mysqli_num_rows($query3)>0)
  {
    while($ro= mysqli_fetch_assoc($query3)){
      echo $ro["message"]."<br>";
    }}
  ?>
</div>

<div class="clearfix"></div>


<?php
        //echo '<a href="send-message.php?owner_id='.$owner_id.'&rental_id='.$rental_id.'">'.$rows["full_name"].'</a>';
    }
  }}}}}?>
    </div>
    </div>



    <?php 
        include("../connection/connection.php");
        global $db;
        $u_email= $_SESSION["email"];

        $sql="SELECT * from owner where email='$u_email'";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
      {
          while($rows=mysqli_fetch_assoc($result)){
          
       ?>



<!-- ______________________________________________________________________ADD PROPERTY_________________________________________________________ -->
<div id="menu1" class="tab-pane fade">
    <center><h3>Add Property</h3></center>
    <div class="container">
        <div id="map_canvas"></div>
        <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="city">City:</label>
                        <select class="form-control" id="city" name="city" required>
                            <option value="">--Select city--</option>
                            <option value="Pokhara">Pokhara</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ward_no">Ward No.:</label>
                      <select class="form-control" id="ward_no" name="ward_no" required>
                      <option value="">--Select Ward No--</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                      <option value="21">21</option>
                      <option value="22">22</option>
                      <option value="23">23</option>
                      <option value="24">24</option>
                      <option value="25">25</option>
                      <option value="26">26</option>
                      <option value="27">27</option>
                      <option value="28">28</option>
                      <option value="29">29</option>
                      <option value="30">30</option>
                      <option value="31">31</option>
                      <option value="32">32</option>
                      <option value="33">33</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Area">Area:</label>
                        <select class="form-control" id="Area" name="Area" required>
                            <option value="">--Select Area--</option>
                            <!-- Area options will be dynamically populated -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Street No">Street No:</label>
                        <input type="number" class="form-control" id="Street" placeholder="Enter Street No" name="Street" min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_no">Contact No.:</label>
                        <input type="text" class="form-control" id="contact_no" placeholder="Enter Contact No." name="contact_no" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="property_type">Property Type:</label>
                        <select class="form-control" name="property_type" required>
                            <option value="">--Select Property Type--</option>
                            <option value="Full House Rent">Full House Rent</option>
                            <option value="Flat Rent">Flat Rent</option>
                            <option value="Room Rent">Room Rent</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estimated_price">Estimated Price:</label>
                        <input type="number" class="form-control" id="estimated_price" placeholder="Enter Estimated Price" name="estimated_price" min="100" required>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="total_rooms">Total No. of Rooms:</label>
                        <input type="number" class="form-control" id="total_rooms" placeholder="Enter Total No. of Rooms" name="total_rooms" min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="bedroom">No. of Bedroom:</label>
                        <input type="number" class="form-control" id="bedroom" placeholder="Enter No. of Bedroom" name="bedroom" min="0" required>
                    </div>
                    <div class="form-group">
                        <label for="living_room">No. of Living Room:</label>
                        <input type="number" class="form-control" id="living_room" placeholder="Enter No. of Living Room" name="living_room" min="0" required>
                    </div>
                    <div class="form-group">
                        <label for="kitchen">No. of Kitchen:</label>
                        <input type="number" class="form-control" id="kitchen" placeholder="Enter No. of Kitchen" name="kitchen" min="0" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Full Description:</label>
                        <textarea class="form-control" id="description" placeholder="Enter Property Description" name="description" required></textarea>
                    </div>
                    <table class="table table-bordered" border="0">
                        <tr>
                            <div class="form-group">
                                <label><b>Latitude/Longitude:</b><span style="color:red; font-size: 10px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; *Click on Button</span></label>
                                <td><input type="text" name="latitude" placeholder="Latitude" id="latitude" class="form-control name_list" required /></td>
                                <td><input type="text" name="longitude" placeholder="Longitude" id="longitude" class="form-control name_list" required /></td>
                                <td><input type="button" value="Get Latitude and Longitude" onclick="getLocation()" class="btn btn-success col-lg-12"></td>
                            </div>
                        </tr>
                    </table>
                    <table class="table" id="dynamic_field">
                        <tr>
                            <div class="form-group">
                                <label><b>Photos:</b></label>
                                <td><input type="file" name="p_photo[]" placeholder="Photos" class="form-control name_list" required accept="image/*" /></td>
                                <td><button type="button" id="add" name="add" class="btn btn-success col-lg-12">Add More</button></td>
                            </div>
                        </tr>
                    </table>
                    <input name="lat" type="text" id="lat" hidden>
                    <input name="lng" type="text" id="lng" hidden>
                    <hr>
                    <div class="form-group">
                        <input type="submit" id="submit" class="btn btn-primary btn-lg col-lg-12" value="Add Property" name="add_property">
                    </div>
                </div>
            </div>
        </form>
        <br><br>
    </div>
</div>
<?php 

          }}

?>

<script>

 document.getElementById('total_rooms').addEventListener('input', function() {
    var totalRooms = parseInt(this.value);
    var bedroom = document.getElementById('bedroom');
    var livingRoom = document.getElementById('living_room');
    var kitchen = document.getElementById('kitchen');
    
    if (totalRooms === 1) {
        bedroom.value = 0;
        bedroom.disabled = true;
        livingRoom.value = 0;
        livingRoom.disabled = true;
        kitchen.value = 0;
        kitchen.disabled = true;
    } else {
        bedroom.disabled = false;
        livingRoom.disabled = false;
        kitchen.disabled = false;
    }
});




const areaOptions = {
    "1": ["Bagar", "Pn campus", "Ki Singpool", "Simpani", "taxichowk", "Tundikhel", "Bhimkali Patan", "Deep Housing"],
    "2": ["Miruwa", "Bhairab Tol", "Guhaeshori Marg", "Mitra Marg", "Mohriya Tol"],
    "3": ["Nadipur", "Kopildunga", "Mahendrapool"],
    "4": ["Gairapatan", "Chipledunga", "Panti Galli", "Shiddhartha Chwok"],
    "5": ["Malepatan", "Dhunge Khola", "Gadatantra Chok", "Shantinagar Chok", "Doke Chok", "Prasyang", "Zero Kilometer"],
    "6": ["Baidam", "Santi Patan", "ShriKrishna Tole"],
    "7": ["Masbar", "Baral chok", "Ghari khet", "Pokhari Patan Tol", "Pragati Tol", "Mulijuli tole", "Sivam Tol"],
    "8": ["Shrijana Chowk", "Bhage Tol", "Indrapuri Tol", "Gyankunj Tol", "RatnaChowk"],
    "9": ["Naya Bazar", "prithivichowk", "Santiban Batika"],
    "10": ["Budha chowk", "Kalika Chowk", "Machhapuchhre tole", "Milan Tole", "Sambridhi Tole", "Indra Chowk", "Pipal Dali Chowk"],
    "11": ["Ranipauwa", "RamGhat Area", "Bhanu chowk"],
    "12": ["Sital Devi", "Bhrikuti Tole", "AmarsingChowk", "Hospital Line", "RaniPauwa"],
    "13": ["Miya Patan", "Bhadarikali Tole", "Khaukhola", "Kasari", "Arba", "Kamlpokhari", "Bajapatan"],
    "14": ["Majheripatan", "Kajipokhari", "Chinnedanda", "Sagarmatha Chowk", "Suryodaya", "Radhakrishna Tole", "Shivashakti Tole"],
    "15": ["Rambazar", "ST.Mary Chowk", "Hariyo Kharkha", "Dunga Sau","church Area", "Belbot", "Kolpata"],
    "16": ["Batulechaur", "Maidan", "Gharmi", "Amala Bisaune", "Armalkot", "Pashchimanchal Campus Area"],
    "17": ["DamSide", "Birauta", "RatoPAiro", "Om Santi Chowk","Ram mandir","Power House","Devi's fall", "Tibetan Refugee Camp"],
    "18": ["Sarangkot", "Chisakhola Basti", "Methlang", "Bhakunde", "Gyarjati", "Toripani"],
    "19": ["Lamachaur", "Puranchaur", "Tallakot", "Chitapani", "Lampata", "Beshi Chwok", "Baura"],
    "20": ["Bhalam", "Aatighar", "Bisauna"],
    "21": ["Nirmal Pokhari", "Phoksing", "Bayeli", "Pokharelthok"],
    "22": ["Pumdi Bhumdi", "KhadeKhola", "PumdiKot", "Dunge Pani", "Peace Pagoda"],
    "23": ["Chapakot", "Bhadaure", "Thula Chaur", "Thulakhet", "Panchase Bhanjyang", "Harpankot", "Ghatichhina"],
    "24": ["Kaskikot", "Kaski", "Ratamata Tole", "Pame"],
    "25": ["Hemja", "Milan Chwok", "Buddha Chok Hemja"],
    "26": ["Budhi Bazar", "kalika Chok", "Dhudhpokhari Tole"],
    "27": ["Tal Chowk", "Lekhnath", "Pargati Tole", "Sundari Tole", "Ekata Tole"],
    "28": ["Kalika", "Thulakot", "Kholabesi", "Kiwarigaun", "Modothan", "SaureBhanjyang"],
    "29": ["Bhandardhik", "Patneri", "Siddhartha Budhha Tole", "Budhibazzar"],
    "30": ["Khudi", "Sishuwa", "Power House", "Dahar Chok", "PU Chok"],
    "31": ["Begnas", "Lakuri Tol", "Pachabhaiya", "Lapsidanda", "Unnati Tol"],
    "32": ["Gagangauda", "Majuya", "Ghauri tol", "Rajako Chautara", "Satmuhane", "Deurali Phedi"],
    "33": ["Bharat Pokhari", "Chisapani", "Upllopudi", "Chauhadi", "Lamgadi", "Apukaseri"]
};

    document.getElementById('ward_no').addEventListener('change', function() {
        var wardNo = this.value;
        var areaSelect = document.getElementById('Area');

        areaSelect.innerHTML = '<option value="">--Select Area--</option>';

        if (areaOptions[wardNo]) {
            areaOptions[wardNo].forEach(function(area) {
                var option = document.createElement('option');
                option.value = area;
                option.text = area;
                areaSelect.appendChild(option);
            });
        }
    });
</script>




<!-- ______________________________________________________________________VIEW PROPERTY_________________________________________________________ -->


    <div id="menu2" class="tab-pane fade">
      <center><h3>View Property</h3></center>
      <div class="container-fluid">
      <input type="text" id="myInput" onkeyup="viewProperty()" placeholder="Search..." title="Type in a name">
            <div style="overflow-x:auto;">
              <table id="myTable">
                <tr class="header">
                  <th>Id.</th>
                  <th>City</th>
                  <th>Ward No.</th>
                  <th>Area</th>
                  <th>Street No</th>
                  <th>Contact No.</th>
                  <th>Property Type</th>
                  <th>Latitude</th>
                  <th>Longitude</th>
                  <th>Estmated Price</th>
                  <th>Total Rooms</th>
                  <th>Bedroom</th>
                  <th>Living Room</th>
                  <th>Kitchen</th>
                  <th>Description</th>
                  <th>Photos</th>
                </tr>
                <?php 
                $u_email=$_SESSION['email'];
        $sql1="SELECT * from owner where email='$u_email'";
        $result1=mysqli_query($db,$sql1);

        if(mysqli_num_rows($result1)>0)
      {
          while($rowss=mysqli_fetch_assoc($result1)){
            $owner_id=$rowss['owner_id'];

        $sql="SELECT * from add_property where owner_id='$owner_id'";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
      {
          while($rows=mysqli_fetch_assoc($result)){
          $property_id=$rows['property_id'];
       ?>
                <tr>
                  <td><?php echo $rows['property_id'] ?></td>
                  <td><?php echo $rows['city'] ?></td>
                  <td><?php echo $rows['ward_no'] ?></td>
                  <td><?php echo $rows['Area'] ?></td>
                  <td><?php echo $rows['Street_No'] ?></td>
                  <td><?php echo $rows['contact_no'] ?></td>
                  <td><?php echo $rows['property_type'] ?></td>
                  <td><?php echo $rows['latitude'] ?></td>
                  <td><?php echo $rows['longitude'] ?></td>
                  <td>Rs.<?php echo $rows['estimated_price'] ?></td>
                  <td><?php echo $rows['total_rooms'] ?></td>
                  <td><?php echo $rows['bedroom'] ?></td>
                  <td><?php echo $rows['living_room'] ?></td>
                  <td><?php echo $rows['kitchen'] ?></td>
                  <td><?php echo $rows['description'] ?></td><td>
<?php $sql2="SELECT * from property_photo where property_id='$property_id'";
        $query=mysqli_query($db,$sql2);

        if(mysqli_num_rows($query)>0)
      {
          while($row=mysqli_fetch_assoc($query)){ ?>
                  <img src="<?php echo $row['p_photo'] ?>" width="50px">
                <?php }}}}}} ?>
                </td>
                </tr>
              </table> 
            </div>
    </div>
    </div>









    <div id="menu3" class="tab-pane fade">
      <center><h3>Update Property</h3></center>
      <div class="container-fluid">
      <input type="text" id="myInput" onkeyup="updateProperty()" placeholder="Search..." title="Type in a name">
            <div style="overflow-x:auto;">
              <table id="myTable">
                <tr class="header">
                  <th>Id.</th>
                  <th>City</th>
                  <th>Ward No.</th>
                  <th>Area</th>
                  <th>Street No</th>
                  <th>Contact No.</th>
                  <th>Property Type</th>
                  <th>Latitude</th>
                  <th>Longitude</th>
                  <th>Estmated Price</th>
                  <th>Total Rooms</th>
                  <th>Bedroom</th>
                  <th>Living Room</th>
                  <th>Kitchen</th>
                  <th>Description</th>
                  <th>Photos</th>
                  <th>Edit/Delete</th>
                </tr>
                <?php 

        $sql="SELECT * from add_property where owner_id='$owner_id'";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
      {
          while($rows=mysqli_fetch_assoc($result)){
          $property_id=$rows['property_id'];
       ?>
                <tr>
                  <td><?php echo $rows['property_id'] ?></td>
                  <td><?php echo $rows['city'] ?></td>
                  <td><?php echo $rows['ward_no'] ?></td>
                  <td><?php echo $rows['Area'] ?></td>
                  <td><?php echo $rows['Street_No'] ?></td>
                  <td><?php echo $rows['contact_no'] ?></td>
                  <td><?php echo $rows['property_type'] ?></td>
                  <td><?php echo $rows['latitude'] ?></td>
                  <td><?php echo $rows['longitude'] ?></td>
                  <td>Rs.<?php echo $rows['estimated_price'] ?></td>
                  <td><?php echo $rows['total_rooms'] ?></td>
                  <td><?php echo $rows['bedroom'] ?></td>
                  <td><?php echo $rows['living_room'] ?></td>
                  <td><?php echo $rows['kitchen'] ?></td>
                  <td><?php echo $rows['description'] ?></td><td>
<?php $sql2="SELECT * from property_photo where property_id='$property_id'";
        $query=mysqli_query($db,$sql2);

        if(mysqli_num_rows($query)>0)
      {
          while($row=mysqli_fetch_assoc($query)){ ?>
                  <img src="<?php echo $row['p_photo'] ?>" width="50px">
                <?php }}  ?>
                </td>
                
                <form method="GET" action="delete.php">
                <td>
                  <input type="hidden" name="property_id" value="<?php echo $rows['property_id']; ?>">
                  <a data-toggle="pill" class="btn btn-success" name="edit_property" onclick="<?php $property_id = $rows['property_id'] ?>" href="#menu5">Edit</a><input type="submit" class="btn btn-danger" name="delete_property" value="Delete" >
                  </td>
                </tr>
                </form>
                <?php }} ?>
              </table> 
            </div>
    </div>
    </div>



<?php


    $sql="SELECT * from add_property where  property_id='$property_id'";
        $result=mysqli_query($db,$sql);
        if(mysqli_num_rows($result)>0)
      {
          while($rows=mysqli_fetch_assoc($result)){
          $property_id=$rows['property_id'];
       ?>




<!-- _____________________________________________________________________UPDATE PROPERTY_________________________________________________________ -->


    <div id="menu5" class="tab-pane fade">
      <center><h3>Edit Property Details</h3></center>
      <div class="container">

<div id="map_canvas"></div>

<form method="POST" enctype="multipart/form-data">
          <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
              <label for="contact_no">Contact No.:</label>
              <input type="text" class="form-control" id="contact_no" placeholder="Enter Contact No." name="contact_no" value="<?php echo $rows['contact_no']?>">
            </div>
            <div class="form-group">
               <label for="property_type">Property Type:</label>
                <select class="form-control" name="property_type" value="<?php echo $rows['property_type'] ?>">
                      <option value=""><?php echo $rows['property_type'] ?></option>
                      <option value="Full House Rent">Full House Rent</option>
                      <option value="Flat Rent">Flat Rent</option>
                      <option value="Room Rent">Room Rent</option>
                </select>
            </div>                      
            <div class="form-group">
                <label for="estimated_price">Estimated Price:</label>
                <input type="text" class="form-control" id="estimated_price" placeholder="Enter Estimated Price" name="estimated_price" min=1000 value="<?php echo $rows['estimated_price'] ?>">
            </div>
            <div class="form-group">
                    <label for="total_rooms">Total No. of Rooms:</label>
                    <input type="number" class="form-control" id="total_rooms" placeholder="Enter Total No. of Rooms" name="total_rooms" min=1 value="<?php echo $rows['total_rooms'] ?>">
                  </div>
        </div>

        <div class="col-sm-6">
                  <div class="form-group">
                    <label for="bedroom">No. of Bedroom:</label>
                    <input type="number" class="form-control" id="bedroom" placeholder="Enter No. of Bedroom" name="bedroom" min=1 value="<?php echo $rows['bedroom'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="living_room">No. of Living Room:</label>
                    <input type="number" class="form-control" id="living_room" placeholder="Enter No. of Living Room" name="living_room" min=0  value="<?php echo $rows['living_room'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="kitchen">No. of Kitchen:</label>
                    <input type="number" class="form-control" id="kitchen" placeholder="Enter No. of Kitchen" name="kitchen" min=0 value="<?php echo $rows['kitchen'] ?>">
                  </div>

                  <div class="form-group">
                    <label for="description">Full Description:</label>
                    <textarea type="comment" class="form-control" id="description" placeholder="Enter Property Description" name="description" value="<?php echo $rows['description'] ?>"></textarea>
                  </div>
                  <table class="table table-bordered" border="0">  
                  <tr> 
                  </tr>  
                <input name="lat" type="text" id="lat" hidden>
                <input name="lng" type="text" id="lng" hidden>
                  <hr>
                  <div class="form-group">
                    <center><input type="submit" class="btn btn-primary btn-lg col-lg-12" value="Update Property" name="update_property"></center>
                  </div>
                </div>
              </div>
              </form>
              <?php }} ?>
              <br><br>

    </div>
    </div>
<?php 
// delete vayeko  message dekhaune 
if (isset($_GET['success']) && $_GET['success'] == 1) {
  echo "<div class='container'>
    <div class='alert alert-success' id='successAlert' role='alert'>
        <strong>Your Property has been deleted successfully.</strong>
    </div>
</div>

<script>
    // Wait for 1 second (1000 milliseconds) then hide the alert
    setTimeout(function(){
        document.getElementById('successAlert').style.display = 'none';
    }, 1000);
</script>";
}

?>

<div id="menu6" class="tab-pane fade">
      <center><h3>Booked Property</h3></center>
      <div class="container">
        <input type="text" id="myInput" onkeyup="bookedProperty()" placeholder="Search..." title="Type in a name">

              <table id="myTable">
                <tr class="header">
                  <th>Booked By</th>
                  <th>Booker Address</th>
                  <th>Property Ward No</th>
                  <th>Property  Area</th>
                  <th>Property street</th>

                </tr>

      <?php 
        include("../connection/connection.php");
            $u_email= $_SESSION["email"];
           

        $sql3="SELECT * from owner where email='$u_email'";
        
            $result3=mysqli_query($db,$sql3);

            if(mysqli_num_rows($result3)>0)
          {
              while($rowss=mysqli_fetch_assoc($result3)){
                $owner_id=$rowss['owner_id'];

                $sql2="SELECT * from add_property where owner_id='$owner_id'";
        $result2=mysqli_query($db,$sql2);

        if(mysqli_num_rows($result2)>0)
      {
          while($ro=mysqli_fetch_assoc($result2)){
            $property_id=$ro['property_id'];

     //   $sql="SELECT * from booking where property_id='$property_id'";
     //   $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result)>0)
      {
          while($rows=mysqli_fetch_assoc($result)){
          
       ?>
                <tr>    
        <?php 
        $rental_id=$rows['rental_id'];
        $property_id=$rows['property_id'];
        $sql1="SELECT *from rental where rental_id='$rental_id'";
        $result1=mysqli_query($db,$sql1);
        if(mysqli_num_rows($result1)>0)
      {
          while($row=mysqli_fetch_assoc($result1)){
          
       ?>


        <td><?php echo $row['full_name']; ?></td>
        <td><?php echo $row['address']; ?></td>

                  <td><?php echo $row['city']; ?></td>
                  <td><?php echo $row['ward_no']; ?></td>
                  <td><?php echo $row['Area']; ?></td>
                </tr>
              
                <?php
               }}}}}}}} ?>
              </table> 
    </div>
    </div>

  </div>
</div>
</body>




<script>
              function viewProperty() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                th = table.getElementsByTagName("th");
                for (i = 1; i < tr.length; i++) {
                  tr[i].style.display = "none";
                    for(var j=0; j<th.length; j++){
                      td = tr[i].getElementsByTagName("td")[j];      
                      if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1)
                        {
                          tr[i].style.display = "";
                          break;
                         }
                      }
                    }
                }
              }
              </script>
<script>
              function updateProperty() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                th = table.getElementsByTagName("th");
                for (i = 1; i < tr.length; i++) {
                  tr[i].style.display = "none";
                    for(var j=0; j<th.length; j++){
                      td = tr[i].getElementsByTagName("td")[j];      
                      if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1)
                        {
                          tr[i].style.display = "";
                          break;
                         }
                      }
                    }
                }
              }
              </script>
              <script>
              function bookedProperty() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                th = table.getElementsByTagName("th");
                for (i = 1; i < tr.length; i++) {
                  tr[i].style.display = "none";
                    for(var j=0; j<th.length; j++){
                      td = tr[i].getElementsByTagName("td")[j];      
                      if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter.toUpperCase()) > -1)
                        {
                          tr[i].style.display = "";
                          break;
                         }
                      }
                    }
                }
              }
              </script>
              <script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="file" name="p_photo[]" placeholder="Photos" class="form-control name_list" required accept="image/*" /></td></td> <td><button id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>'); 
      });  

                 



      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:"name.php",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_name')[0].reset();  
                }  
           });  
      });  
 });  
 </script>



 <script>
   if (status == google.maps.GeocoderStatus.OK) {
    map.setCenter(results[0].geometry.location);
    var marker = new google.maps.Marker;
    document.getElementById('lat').value = results[0].geometry.location.lat();
    document.getElementById('lng').value = results[0].geometry.location.lng();


   // add this
    var latt=results[0].geometry.location.lat();
    var lngg=results[0].geometry.location.lng();
    $.ajax({
        url: "your-php-code-url-to-save-in-database",
        dataType: 'json',
        type: 'POST',
        data:{ lat: lat, lng: lngg },
        success : function(data)
        {                 
        }
   });


 }
 </script>


 <script>
  //For Latitude and Longitude
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    document.getElementById("latitude").value = "Geolocation is not supported by this browser.";
    document.getElementById("longitude").value = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  document.getElementById("latitude").value = position.coords.latitude;
  document.getElementById("longitude").value = position.coords.longitude;
}
</script>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>