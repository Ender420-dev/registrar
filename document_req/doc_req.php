<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css?v=1.3">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
        @import url("../style.css");

        /* Make sidebar scrollable in landscape mode on mobile devices */
        @media (max-width: 768px) and (orientation: landscape) {
            .sidebar {
                max-height: 100vh;
                overflow-y: auto;
            }
        }
    </style>
</head>

<body>
    <!-- navbar -->

    <?php include '../sidenav.php'; ?>





    <div class="main-content flex-grow-1">
        <div class="container">
            <div class="card" style="height:700px; overflow-x:scroll;">
                <div class="card-content">
                    <h3 class="card-header text-center">Document Requests</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="list-group" id="list-tab" role="tablist">

                            <input type="text" id="listSearch" class="form-control mb-2" placeholder="Search tab...">
                                <a href="#" class="list-group-item list-group-item-action active" role="tab"
                                    aria-controls="list-new" data-bs-toggle="list">New </a>
                                <a href="#" class="list-group-item list-group-item-action" role="tab"
                                    aria-controls="list-new" data-bs-toggle="list">Done </a>
                                <a href="#" class="list-group-item list-group-item-action" role="tab"
                                    aria-controls="list-new" data-bs-toggle="list">Rejected</a>
                                
                            </div>






                        </div>
                        <div class="col-lg-10">
                            <div class="container mt-5">
                                <h5>📌 Document Request Status</h5>
                                <table class="table table-bordered table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Student ID</th>
                                            <th>Name</th>
                                            <th>Document</th>
                                            <th>Purpose</th>
                                            <th>Status</th>
                                            <th>Date Requested</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>2023-0001</td>
                                            <td>John Doe</td>
                                            <td>Good Moral</td>
                                            <td>Scholarship</td>
                                            <td><span class="badge bg-warning">Pending</span></td>
                                            <td>2025-07-26</td>
                                            <td>
                                                <div class="btn-group" role="group"> 
                                                    <button type="button" class="btn btn-success">Edit</button>
                                                    <button type="button" class="btn btn-primary">View</button>
                                                    <button type="button" class="btn btn-danger">Delete</button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="mt-auto bg-light">
        <div class="container text-center">
            <p class="text-muted">© 2025 Registrar SIS. All rights reserved.</p>
        </div>
    </footer>


    </style>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
    integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK"
    crossorigin="anonymous"></script>

</html>
<script>

document.getElementById('listSearch').addEventListener('keyup', function () {
        let input = this.value.toLowerCase();
        let items = document.querySelectorAll('#list-tab .list-group-item');

        items.forEach(function (item) {
            let text = item.textContent.toLowerCase();
            if (text.includes(input)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    });
</script>