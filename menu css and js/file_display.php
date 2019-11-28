<h3>Uploaded Files:</h3>
                    <br/>
                    <?php
                        $conn = mysqli_connect("localhost","root","","phpfiles");

                        $query = "SELECT *FROM UserFiles";

                        $result = mysqli_query($conn, $query);

                        if(mysqli_num_rows($result) > 0)
                        {
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $url = $row["FilePath"]."/".$row["FileName"];
                    ?>
                                <a href="<?php echo $url; ?>"><image src="<?php echo $url; ?>" class="images" /></a>
                    <?php
                            }
                        }
                        else
                        {
                    ?>
                        <p>There are no images uploaded to display.</p>
                    <?php
                        }
                    ?>
