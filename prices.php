<?php 

    require_once 'header.php';

?>

<div class="basic-price-table">
    <div class="container">
        <div class="col-md-12">

            <table class="table table-bordered table-striped table-hover mt-5 mb-5">
                <thead>
                    <tr>
                        <td colspan="4">
                            <h3>Basic Price (Based on Distance/Location)</h3>
                        </td>
                    </tr>
                    <tr>
                        <th scope="col">Destination</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Dhaka</td>
                        <td>Chattogram</td>
                        <td>1500 TK</td>
                    </tr>
                    <tr>
                        <td>Dhaka</td>
                        <td>Shylet</td>
                        <td>1200 TK</td>
                    </tr>
                    <tr>
                        <td>Dhaka</td>
                        <td>Rajshahi</td>
                        <td>700 TK</td>
                    </tr>
                    <tr>
                        <td>Dhaka</td>
                        <td>Khulna</td>
                        <td>900 TK</td>
                    </tr>
                    <tr>
                        <td>Dhaka</td>
                        <td>Rangpur</td>
                        <td>800 TK</td>
                    </tr>
                    <tr>
                        <td>Dhaka</td>
                        <td>Barisal</td>
                        <td>1000 TK</td>
                    </tr>
                    <tr>
                        <td>Dhaka</td>
                        <td>Mymensingh</td>
                        <td>600 TK</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="others-price-table">
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <table class="table table-bordered table-striped table-hover mt-5 mb-5">
                    <thead>
                        <tr>
                            <td colspan="4">
                                <h3>Price on Weight</h3>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Weight</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>0-5 kg</td>
                            <td>No Charge</td>
                        </tr>
                        <tr>
                        <tr>
                            <td>5.1-10 kg</td>
                            <td>Basic Price * 1.11</td>
                        </tr>
                        <tr>
                            <td>10.1-25 kg</td>
                            <td>Basic Price * 1.22</td>
                        </tr>
                        <tr>
                            <td>25.1-100 kg</td>
                            <td>Basic Price * 1.33</td>
                        </tr>
                        <tr>
                            <td>More than 100 kg</td>
                            <td>Basic Price * 1.44</td>
                        </tr>
                        <tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">

                <table class="table table-bordered table-striped table-hover mt-5 mb-5">
                    <thead>
                        <tr>
                            <td colspan="4">
                                <h3>Price on Volume</h3>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">Volume</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>0-8 m^3</td>
                            <td>No Charge</td>
                        </tr>
                        <tr>
                            <td>8.1-27 m^3</td>
                            <td>Basic Price * 1.10</td>
                        </tr>
                        <tr>
                            <td>27.1-64 m^3</td>
                            <td>Basic Price * 1.15</td>
                        </tr>
                        <tr>
                            <td>64.1-124 m^3</td>
                            <td>Basic Price * 1.20</td>
                        </tr>
                        <tr>
                            <td>More than 124 m^3</td>
                            <td>Basic Price * 1.25</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="total-price mt-3 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5>Total Price = Basic Price + Weight Price + Volume Price</h5>
            </div>
        </div>
    </div>
</div>

<?php
    require_once 'footer.php';

?>