<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="./view/css/style.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <div id="table-container">
    <?php
    if (! empty($productResults)) {
        ?>
        <table id="tab">
            <thead>
                <tr>
                    <th width="35%">Product Name</th>
                    <th width="20%">Price</th>
                    <th width="25%">Category</th>
                    <th width="20%">Average Rating</th>
                </tr>
            </thead>
            <tbody>
            <?php
        foreach ($productResult as $key => $value) {
            ?>   
                <tr>
                    <td><?php echo $productResult[$key]["name"]; ?></td>
                    <td><?php echo $productResult[$key]["price"]; ?></td>
                    <td><?php echo $productResult[$key]["category"]; ?></td>
                    <td><?php echo $productResult[$key]["average_rating"]; ?></td>
                </tr>
            <?php
        }
        ?>
            </tbody>
        </table>

        <div class="btn">
            <form action="" method="post">
                <button type="submit" id="btnExport" name='export'
                    value="Export to Excel" class="btn btn-info">Export
                    to Excel</button>
            </form>
        </div>
    <?php
    }
    else
    {
    ?>
    <div class="empty-table">
    <div class="svg-icon">
    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><circle cx="12" cy="19" r="2"/><path d="M10 3h4v12h-4z"/><path fill="none" d="M0 0h24v24H0z"/></svg>
    </div>
    No records found</div>
    <?php 
    }
    ?>
    </div>
</body>
</html>