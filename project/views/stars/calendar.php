  <section class="base">
      <div class="box">
          <div class="form-inner">
              <h2>Календарь Звездопадов</h2>
              <h4 class="title">Ближайший звездопад: "<?= $soon['name']; ?>" </h4>
              <p class="text"> Состоится <?= $soon['date']?>, через <?= $count;?>.</p>
              <div class="table-box">
                  <table>
                    <tr>
                        <th>Дата</th>
                        <th>Звездопад</th>
                        <th>Инфо</th>
                    </tr>
                    <?php foreach ($stars as $id=> $star): ?>
                        <tr>
                            <td class="<?=$star['color'];?>"><?= $star['date']; ?></td>
                            <td class="<?=$star['color'];?>"><?= $star['name']; ?></td>
                            <td>
                                <a class="<?=$star['color'];?>" href="/stars/info/<?= $id;?>/">Подробнее...
                            </td>
                        </tr>
                        <?php endforeach; ?>
                 </table>
              </div>
              <p class="black small">* черным цветом отмечены прошедшие звездопады</p>
          </div>
      </div>
  </section>

