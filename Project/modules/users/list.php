<?php


$data = [
    'pageTitle' => 'Quản lý người dùng'
];

layout('header', $data);
?>


<div class="container">
    <hr />
    <h3><?php echo $data['pageTitle']; ?></h3>
    <p>
        <a href="?module=users&action=add" class="btn btn-success btn-sm">Thêm người dùng</i>
        </a>
    </p>

    <form action="" method="GET">
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option value="0">Chọn trạng thái</option>
                        <option value="1" <?php echo (!empty($status) && $status == 1) ? 'selected' : false; ?>>Kích
                            hoạt
                        </option>
                        <option value="2" <?php echo (!empty($status) && $status == 2) ? 'selected' : false; ?>>Chưa
                            kích hoạt
                        </option>
                    </select>
                </div>
            </div>

            <div class="col-6">
                <input type="search" class="form-control" name="keyword" placeholder="Từ khoá tìm kiếm..." value="<?php echo (!empty($keyword)) ? $keyword : false; ?>">
            </div>

            <div class="col-3">
                <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
            </div>

        </div>
        <input type="hidden" name="module" value="users">
    </form>


    <?php
    // getMsg($msg, $msgType);
    ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Điện thoại</th>
                <th>Trạng thái</th>
                <th width="5%">Sửa</th>
                <th width="5%">Xoá</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($listAllUser)) :
                $count = 0; //Hiển thị số thứ tự
                foreach ($listAllUser as $item) :
                    $count++;
            ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $item['fullname']; ?></td>
                        <td><?php echo $item['email']; ?></td>
                        <td><?php echo $item['phone']; ?></td>
                        <td><?php echo $item['status'] == 1 ? '<button type="button" class="btn btn-success btn-sm">Kích hoạt</button>' : '<button type="button" class="btn btn-warning btn-sm">Chưa kích hoạt</button>'; ?>
                        </td>
                        <td><a href="<?php echo _WEB_HOST_ROOT . '?module=users&action=edit&id=' . $item['id']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a></td>
                        <td><a href="<?php echo _WEB_HOST_ROOT . '?module=users&action=delete&id=' . $item['id']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
                <?php endforeach;
            else : ?>
                <tr>
                    <td colspan="7">
                        <div class="alert alert-danger text-center">Không có người dùng</div>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php echo 'Phân trang ở đây' ?>
        </ul>
    </nav>

    <hr />
</div>
<?php
layout('footer');