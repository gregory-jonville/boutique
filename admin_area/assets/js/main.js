
// Produit
function DeleteProduct(product_id) {
    swal({
      title: "Êtes vous sûr ?",
      text: "Cette action est irréversible !",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Oui",
      cancelButtonClass: "btn-info",
      cancelButtonText: "Annuler",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        window.location.href = "./includes/delete_product.php?product_id=" +product_id+ "";
        return true;

        swal("Suppression effectuée !");
      } else {
        swal("Suppression annulée !");
      }
    }); 
} 


// Catégorie de produit
function DeletePCat(p_cat_id) {
    swal({
      title: "Êtes vous sûr ?",
      text: "Cette action est irréversible !",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Oui",
      cancelButtonClass: "btn-info",
      cancelButtonText: "Annuler",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        window.location.href = "./includes/delete_p_cat.php?p_cat_id=" +p_cat_id+ "";
        return true;

        swal("Suppression effectuée !");
      } else {
        swal("Suppression annulée !");
      }
    }); 
} 


// Catégorie
function DeleteCat(cat_id) {
    swal({
      title: "Êtes vous sûr ?",
      text: "Cette action est irréversible !",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Oui",
      cancelButtonClass: "btn-info",
      cancelButtonText: "Annuler",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        window.location.href = "./includes/delete_cat.php?cat_id=" +cat_id+ "";
        return true;

        swal("Suppression effectuée !");
      } else {
        swal("Suppression annulée !");
      }
    }); 
} 


// Slide
function DeleteSlide(slide_id) {
    swal({
      title: "Êtes vous sûr ?",
      text: "Cette action est irréversible !",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Oui",
      cancelButtonClass: "btn-info",
      cancelButtonText: "Annuler",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        window.location.href = "./includes/delete_slide.php?slide_id=" +slide_id+ "";
        return true;

        swal("Suppression effectuée !");
      } else {
        swal("Suppression annulée !");
      }
    }); 
} 


// Client
function DeleteCustomer(customer_id) {
    swal({
      title: "Êtes vous sûr ?",
      text: "Cette action est irréversible !",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Oui",
      cancelButtonClass: "btn-info",
      cancelButtonText: "Annuler",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        window.location.href = "./includes/delete_customer.php?customer_id=" +customer_id+ "";
        return true;

        swal("Suppression effectuée !");
      } else {
        swal("Suppression annulée !");
      }
    }); 
} 


// Ventes
function DeleteOrder(order_id) {
    swal({
      title: "Êtes vous sûr ?",
      text: "Cette action est irréversible !",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Oui",
      cancelButtonClass: "btn-info",
      cancelButtonText: "Annuler",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        window.location.href = "./includes/delete_order.php?order_id=" +order_id+ "";
        return true;

        swal("Suppression effectuée !");
      } else {
        swal("Suppression annulée !");
      }
    }); 
} 


// Paiements
function DeletePayment(payment_id) {
    swal({
      title: "Êtes vous sûr ?",
      text: "Cette action est irréversible !",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Oui",
      cancelButtonClass: "btn-info",
      cancelButtonText: "Annuler",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        window.location.href = "./includes/delete_payment.php?payment_id=" +payment_id+ "";
        return true;

        swal("Suppression effectuée !");
      } else {
        swal("Suppression annulée !");
      }
    }); 
} 


// Admin
function DeleteUser(admin_id) {
    swal({
      title: "Êtes vous sûr ?",
      text: "Cette action est irréversible !",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Oui",
      cancelButtonClass: "btn-info",
      cancelButtonText: "Annuler",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        window.location.href = "./includes/delete_user.php?admin_id=" +admin_id+ "";
        return true;

        swal("Suppression effectuée !");
      } else {
        swal("Suppression annulée !");
      }
    }); 
} 