<?php
/**
 * @file
 * Display the progress bar for multipage forms
 *
 * Available variables:
 * - $node: The webform node.
 * - $progressbar_page_number: TRUE if the actual page number should be
 *   displayed.
 * - $progressbar_percent: TRUE if the percentage complete should be displayed.
 * - $progressbar_bar: TRUE if the bar should be displayed.
 * - $progressbar_pagebreak_labels: TRUE if the page break labels shoud be
 *   displayed.
 * - $page_num: The current page number.
 * - $page_count: The total number of pages in this form.
 * - $page_labels: The labels for the pages. This typically includes a label for
 *   the starting page (index 0), each page in the form based on page break
 *   labels, and then the confirmation page (index number of pages + 1).
 * - $percent: The percentage complete.
 */
?>

<?php if (isset($node->field_mobile_form['und'][0]['value']) && $node->field_mobile_form['und'][0]['value'] !== '0') : ?>
    <div id="disclaimer"></div>
    <div class="webform-progressbar mobile">
      <?php if ($progressbar_bar): ?>
          <ul>
            <?php for ($n = 1; $n < $page_count; $n++): ?>
                <li <?php if ($page_num === $n) {
                  print " class=\"current\" ";
                } ?><?php if ($page_num > $n) {
                  print " class=\"previous\"";
                } ?>>
                </li>
              <?php if ($page_count != $n + 1): ?>
                    <li class="line"></li>
              <?php endif ?>
            <?php endfor; ?>
          </ul>

          <ul class="list-progressbar">
            <?php for ($n = 1; $n < $page_count; $n++): ?>
                <li class="labels-progressbar <?php if ($page_num === $n) {
                  print "current";
                } ?><?php if ($page_num > $n) {
                  print "previous";
                } ?>">
                  <?php print check_plain(mb_strtoupper($page_labels[$n - 1])); ?>
                </li>
              <?php if ($page_count != $n + 1): ?>
                    <li class="labels-empty"></li>
              <?php endif ?>
            <?php endfor; ?>
          </ul>
      <?php endif; ?>
    </div>
<?php else:?>
    <div class="webform-progressbar">
      <?php if ($progressbar_bar): ?>
          <div class="webform-progressbar-outer">
              <div class="webform-progressbar-inner" style="width: <?php print number_format($percent, 0); ?>%">&nbsp;</div>
            <?php for ($n = 1; $n <= $page_count; $n++): ?>
                <span class="webform-progressbar-page<?php if ($n < $page_num): print ' completed'; endif; ?><?php if ($n == $page_num): print ' current'; endif; ?>" style="<?php print ($GLOBALS['language']->direction == 0) ? 'left' : 'right'; ?>: <?php print number_format(($n - 1) / ($page_count - 1), 4) * 100; ?>%">
          <span class="webform-progressbar-page-number"><?php print $n; ?></span>
                  <?php if ($progressbar_pagebreak_labels): ?>
                      <span class="webform-progressbar-page-label">
            <?php print check_plain($page_labels[$n - 1]); ?>
          </span>
                  <?php endif; ?>
        </span>
            <?php endfor; ?>
          </div>
      <?php endif; ?>


      <?php if ($progressbar_page_number): ?>
          <div class="webform-progressbar-number">
            <?php print t('Page @start of @end', array('@start' => $page_num, '@end' => $page_count)); ?>
            <?php if ($progressbar_percent): ?>
                <span class="webform-progressbar-number">
          (<?php print number_format($percent, 0); ?>%)
        </span>
            <?php endif; ?>
          </div>
      <?php endif; ?>

      <?php if (!$progressbar_page_number && $progressbar_percent): ?>
          <div class="webform-progressbar-number">
            <?php print number_format($percent, 0); ?>%
          </div>
      <?php endif; ?>
    </div>

<?php endif; ?>
