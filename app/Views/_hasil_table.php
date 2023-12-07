<?php
usort($hasilPerhitungan, function ($a, $b) {
    return $b['skor'] <=> $a['skor'];
});
foreach ($hasilPerhitungan as $index => $hasil) : ?>
    <tr data-periode="<?= $hasil['id_periode'] ?>">
        <td><?= $index + 1 ?></td>
        <td><?= $hasil['nama'] ?></td>
        <td><?= $hasil['skor'] ?></td>
        <td><?= $hasil['periode'] ?></td>
        <td><?= $hasil['diterima'] ?></td>
    </tr>
<?php endforeach; ?>