<style>
  #sidebar{
    background-color: #272b30;
  }
  
  #sidebar-ul{
    height: 90vh;
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
  }

  #sidebar-ul li{
    background-color: #343a40df;
    padding: 10px;
    box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 48px;
    margin-left: 10px;
    border-radius: 20px 0px 0px 20px;
  }

  #sidebar-ul li a{
    color: #fff;
    font-size: 15px;
    font-weight: 600px;
  }
</style>

<nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div id="sidebar" class="sidebar-sticky">
        <ul id="sidebar-ul" class="nav flex-column">

          <?php 


            $uri = $_SERVER['REQUEST_URI']; 
            $uriAr = explode("/", $uri);
            $page = end($uriAr);

          ?>


          <li id="dashboard" class="nav-item">
            <a class="nav-link" href="index.php">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
         <li id="add-movie" class="nav-item">
            <a class="nav-link" href="add-movie.php">
              <span data-feather="users"></span>
              Add Movie
            </a>
          </li>
         <li id="theater" class="nav-item">
            <a class="nav-link" href="Theater_and_show.php">
              <span data-feather="users"></span>
              Theater And Show
            </a>
          </li>
          
          <li id="customer" class="nav-item">
            <a class="nav-link" href="customers.php">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
           <li id="feedback" class="nav-item">
            <a class="nav-link" href="Feedback.php">
              <span data-feather="users"></span>
              Feedback
            </a>
          </li>
           <li id="user" class="nav-item">
            <a class="nav-link" href="users.php">
              <span data-feather="users"></span>
              Users
            </a>
          </li>
          <li id="feedback" class="nav-item">
            <a class="nav-link" href="offers.php">
              <span data-feather="users"></span>
              Offers
            </a>
          </li>
           
        </ul>


       
      </div>
    </nav>


    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Hello <?php echo $_SESSION["admin"]; ?></h1>
        
      </div>