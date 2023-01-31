    <section class="product" id="product">
        <div class="container" anim="fade">
            <div class="row">
                <div class="col">
                    <h2><?php echo $text['product']['h1'][$ln] ?></h2>
                    <div class="sub-title"><?php echo $text['product']['t'][$ln] ?></div>
                </div>
            </div>
            <div class="row no-mobile">
                <div class="col-12">
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th scope="row"></th>
                                    <th>
                                        <div class="name">
                                            <div><?php echo $text['product']['c1'][$ln] ?></div>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="name">
                                            <div><?php echo $text['product']['c2'][$ln] ?></div>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tfoot class="buttons">
                                <tr>
                                    <th>
                                        <div class="default">
                                            <a href='<?php echo "/subscribe-stop/{$link}/subscribe-stop.php"?>'
                                                class="btn btn--main"><?php echo $text['product']['otm'][$ln] ?></a>
                                        </div>
                                    </th>
                                    <td>
                                        <div class="buttons_wrap">
                                            <a href="#modal-free" data-toggle="modal"
                                                class="btn btn--main"><?php echo $text['product']['pop'][$ln] ?></a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="buttons_wrap">
                                            <a href="#modal-subscribe" data-toggle="modal" class="btn btn--main">
                                                <?php echo $text['product']['of'][$ln] ?></a>
                                            <!-- <form class="form--main  ko-off" action="" method="post" comment="Остались вопросы">
                                                <select class="form-select selectpicker" aria-label="Default select example">
                                                    <option selected>12 меc. — 3 590 ₽</option>
                                                    <option value="1">3 меc. — 1 290 ₽</option>
                                                    <option value="2">1 меc. — 499 ₽</option>
                                                </select>
                                                <button type="submit" class="btn--main">Оформить подписку на сайте</button>
                                            </form> -->
                                        </div>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <th></th>
                                    <td></td>
                                    <td>
                                        <div class="promotion">
                                            <p><b>Скидка</b><br>Годовая подписка ₽ вместо <s>₽</s></p>
                                        </div>
                                    </td>
                                </tr> -->
                            </tfoot>
                            <tbody class="tbody">
                                <tr>
                                    <th>
                                        <div><?php echo $text['product']['l1'][$ln] ?></div>
                                        </td>
                                    <td>
                                        <div><?php echo $text['product']['do40'][$ln] ?></div>
                                    </td>
                                    <td>
                                        <div><?php echo $text['product']['bolee600'][$ln] ?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <div><?php echo $text['product']['l2'][$ln] ?></div>
                                    </th>
                                    <td>
                                        <div><span class="yes"></span></div>
                                    </td>
                                    <td>
                                        <div><span class="yes"></span></div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <div><?php echo $text['product']['l3'][$ln] ?></div>
                                    </th>
                                    <td>
                                        <div><span class="yes"></span></div>
                                    </td>
                                    <td>
                                        <div><span class="yes"></span></div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <div><?php echo $text['product']['l4'][$ln] ?></div>
                                    </th>
                                    <td>
                                        <div><span class="no"></span></div>
                                    </td>
                                    <td>
                                        <div><span class="yes"></span></div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <div><?php echo $text['product']['l5'][$ln] ?></div>
                                    </th>
                                    <td>
                                        <div><span class="no"></span></div>
                                    </td>
                                    <td>
                                        <div><span class="yes"></span></div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>