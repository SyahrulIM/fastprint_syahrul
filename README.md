# Workflow

![A diagram of a product Description automatically
generated](./images/image1.png)

# Fitur

**1. Tambah Produk**

**Langkah-langkah:**

-   **Step 1:** Klik tombol **"Tambah Produk"**.

-   **Step 2:** Form input untuk data produk akan muncul.

-   **Step 3:** Isi form dengan informasi produk yang dibutuhkan.

-   **Step 4:** Klik tombol **"Simpan"** untuk menyimpan data yang
    diinput.

-   **Step 5:** Produk berhasil ditambahkan ke dalam sistem.

**2. Edit Produk**

**Langkah-langkah:**

-   **Step 1:** Klik tombol **"Edit"** pada produk yang ingin
    diperbarui.

-   **Step 2:** Form edit akan muncul dengan data produk yang bisa
    diubah.

-   **Step 3:** Lakukan perubahan yang diperlukan.

-   **Step 4:** Klik tombol **"Simpan"** untuk menyimpan perubahan.

-   **Step 5:** Data produk berhasil diperbarui.

**3. Hapus Produk**

**Langkah-langkah:**

-   **Step 1:** Klik tombol **"Hapus"** pada produk yang ingin dihapus.

-   **Step 2:** Muncul konfirmasi untuk menghapus produk.

-   **Step 3:** Klik **"Ya"** jika yakin ingin menghapus.

-   **Step 4:** Produk akan dihapus dari daftar.

# Tutorial Config Codeigniter 3

**1. Instalasi CodeIgniter**

-   Ekstrak ke direktori Web server anda, semisal **C:\\laragon\\www\\**

**2. Konfigurasi Database**

-   Buka file application/config/database.php, lalu atur koneksi
    database:

\<?php

defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');

​

\$active_group = \'default\';

\$query_builder = TRUE;

​

\$db\[\'default\'\] = array(

\'dsn\' =\> \'\',

\'hostname\' =\> \'localhost\',

\'username\' =\> \'root\',

\'password\' =\> \'\',

\'database\' =\> \'fastprint_syahrul\',

\'dbdriver\' =\> \'mysqli\',

\'dbprefix\' =\> \'\',

\'pconnect\' =\> FALSE,

\'db_debug\' =\> (ENVIRONMENT !== \'production\'),

\'cache_on\' =\> FALSE,

\'cachedir\' =\> \'\',

\'char_set\' =\> \'utf8\',

\'dbcollat\' =\> \'utf8_general_ci\',

\'swap_pre\' =\> \'\',

\'encrypt\' =\> FALSE,

\'compress\' =\> FALSE,

\'stricton\' =\> FALSE,

\'failover\' =\> array(),

\'save_queries\' =\> TRUE

**3. Import Database**

-   Run sql file "fastprint_syahrul.sql" yang ada di fastprint folder ke
    server sql anda

**4. Import Database**

-   Aplikasi dapat digunakan dengan maksimal

# Tutorial Tambah Produk

## Step 1

Klik tombol "Tambah Produk"

![A screenshot of a computer Description automatically
generated](./images/image2.png)

## Step 2

maka akan muncul form input untuk data produk

![A screenshot of a computer Description automatically
generated](./images/image3.png)

## Step 3

Isi form sesuai dengan kebutuhan data produknya

![A screenshot of a computer Description automatically
generated](./images/image4.png)

## Step 4

Klik tombol "Simpan" untuk menyimpan data yang di input kan

![A screenshot of a computer Description automatically
generated](./images/image5.png)
## 

## Step 5

Data berhasil ditambahkan

![A screenshot of a computer Description automatically
generated](./images/image6.png)
