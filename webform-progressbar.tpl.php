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

<style>

</style>

<div class="webform-progressbar">
    <?php if ($progressbar_bar): ?>
    <ul>
        <?php for ($n = 1; $n < $page_count; $n++): ?>
            <li <?php if($page_num === $n) print " class=\"current\" "; ?><?php if($page_num > $n) print " class=\"previous\""; ?>>
            </li>
            <?php if($page_count != $n+1): ?>
                <li class="line"></li>
            <?php endif ?>
        <?php endfor; ?>
    </ul>

   <ul class="list-progressbar">
        <?php for ($n = 1; $n < $page_count; $n++): ?>
            <li class="labels-progressbar <?php if($page_num === $n) print "current"; ?><?php if($page_num > $n) print "previous"; ?>">
                <?php print check_plain(mb_strtoupper($page_labels[$n-1]));?>
            </li>
            <?php if($page_count != $n+1): ?>
                <li class="labels-empty"></li>
            <?php endif ?>
        <?php endfor; ?>
    </ul>
    <?php endif; ?>
</div>

