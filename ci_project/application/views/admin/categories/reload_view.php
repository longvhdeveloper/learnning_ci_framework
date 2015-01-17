<table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th class="td-actions"> </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($categories as $key => $category) {
                                    echo '<tr>';
                                    echo '<td>'.($key+1).'</td>';
                                    echo '<td>'.$category['name'].'</td>';
                                    echo '<td class="td-actions"><a href="'.base_url().  $module.'/categories/edit/'.$category['id'].'" class="btn btn-small btn-success"><i class="btn-icon-only icon-pencil"> </i></a><a onclick="return confirm_delete(\'Are you sure?\')" href="'.base_url().  $module.'/categories/delete/'.$category['id'].'" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>';
                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                            </table>