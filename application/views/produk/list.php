<div class="content-page">
     <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Produk List</h4>
                        
                    </div>
                    <a href="<?= site_url('produk/tambah');?>" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Tambah Produk</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                <table class="data-tables table mb-0 tbl-server-info">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>
                           
                            <th>Nama Produk</th>
                            <th>stok</th>
                            <th>Modal</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th>Kategori</th>
                            <th>Aksi</th>      
                        </tr>
                    </thead>
                    <tbody>
                           <?php foreach ($produks as $produk): ?>
                    <tr>
                        
                        <td><?= $produk['id']; ?></td>
                        <td><?= $produk['nama']; ?></td>
                        <td><?= $produk['stok']; ?></td>
                        <td><?= $produk['modal']; ?></td>
                        <td><?= $produk['harga']; ?></td>
                        
                        <td>
                            <img src="<?= $produk['gambar']; ?>" alt="Produk Image" width="50"></td>
                        
                        <td><?= $produk['kategori']; ?></td>
                        <td>
                            <a href="edit-product.php?id=<?= $produk['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete-product.php?id=<?= $produk['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
    </div>
                   
                          

                             
                       
                           