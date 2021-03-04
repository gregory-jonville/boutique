<!-- START -->
<div class="page-heading">
    <h1 class="page-title">Paiements</h1>
</div>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Paiements</li>
    </ol>
</nav>



<?php if (isset($_SESSION['delete_payment_msg'])) : ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                <?= $_SESSION['delete_payment_msg'];
                unset($_SESSION['delete_payment_msg']); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif ?>




<div class="page-content fade-in-up">
    <div class="ibox rounded">
        <div class="ibox-head bg-light">
            <div class="ibox-title"><i class="fas fa-list-ul"></i> Liste des paiements</div>
        </div>
        <div class="ibox-body">
            <table class="table table-bordered table-hover table-responsive-lg" id="example-table" cellspacing="0" width="100%">
                <thead class="bg-light">
                    <tr>
                        <th>Paiement N°</th>
                        <th>Facture N°</th>
                        <th>Montant</th>
                        <th>Moyen de paiement</th>
                        <th>Référence N°</th>
                        <th>Code</th>
                        <th>Date</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr></tr>
                </tfoot>
                <tbody>
                    <?php
                    $i = 0;
                    $view_payments = $getFromU->viewAllFromTable('payments');
                    foreach ($view_payments as $view_payment) {
                        $payment_id = $view_payment->payment_id;
                        $invoice_no = $view_payment->invoice_no;
                        $amount = $view_payment->amount;
                        $payment_mode = $view_payment->payment_mode;
                        $ref_no = $view_payment->ref_no;
                        $code = $view_payment->code;
                        $payment_date = $view_payment->payment_date;
                        $i++;

                    ?>

                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $invoice_no; ?></td>
                            <td class="text-right">$ <?= number_format($amount, 2); ?></td>
                            <td><?= $payment_mode; ?></td>
                            <td><?= $ref_no; ?></td>
                            <td><?= $code; ?></td>
                            <td><?= $payment_date; ?></td>
                            <td>
                                <a class="text-danger" onclick="DeletePayment('<?= $payment_id; ?>')"><i class="fas fa-trash-alt"></i> X</a>
                            </td>

                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- CORE PLUGINS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- SCRIPTS-->
<script>
    $(function() {
        $('#example-table').DataTable({
            pageLength: 10,
        });
    });
</script>