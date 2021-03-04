<?php
  $customer_session = $_SESSION['customer_email'];

  $get_customer = $getFromU->view_customer_by_email($customer_session);

  $customer_name = $get_customer->customer_name;
  $customer_image = $get_customer->customer_image;

?>



<div class="card sidebar-menu mb-5 profile">
  <div class="card-header p-3">
    <img class="card-img-top img-fluid rounded" src="assets/customer_images/<?= $customer_image; ?>" alt="Card image cap">
    <h6 class="card-title text-center mt-4 mb-0"><?= $customer_name; ?></h6>
  </div>

  <ul class="list-group list-group-flush">
    <li class="list-group-item <?php if(isset($_GET['my_orders'])) { echo "active";} ?>"  >
      <a href="my_account.php?my_orders"><i class="fas fa-list-ul"></i> Mes achats</a>
    </li>
    <li class="list-group-item <?php if(isset($_GET['edit_account'])) { echo "active";} ?>">
      <a href="my_account.php?edit_account"><i class="fas fa-edit"></i> Mes données</a>
    </li>
      <li class="list-group-item <?php if(isset($_GET['change_pass'])) { echo "active";} ?>">
        <a href="my_account.php?change_pass"><i class="fas fa-exchange-alt"></i> Mot de passe</a>
    </li>
      <li class="list-group-item <?php if(isset($_GET['delete_account'])) { echo "active";} ?>">
        <a href="my_account.php?delete_account"><i class="fas fa-trash-alt"></i> Supprimer le compte</a>
    </li>
      <li class="list-group-item">
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
    </li>
  </ul>

</div>