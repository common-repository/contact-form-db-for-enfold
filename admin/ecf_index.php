<?php function ecf_index(){  $results = $GLOBALS['EnfoldListDb']->all(); ?>
  <style>
    table { width: 100%; text-align: left;}
    table tbody tr td,th{ padding:10px; }
    table tbody tr:nth-child(odd){
      background-color: #dedede;
    }
  </style>
  <div class="wrap">
    <h1><?php _e('Contact Form Db') ?></h1>
    <div class="wrap">
      <div class="icon32" id="icon-options-general"><br /></div>
    </div>
    <table>
      <thead>
        <tr>
          <th><?php _e('Page', 'ecf') ?></th>
          <th><?php _e('Enfold Message', 'ecf') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($results as $key => $value) { ?>
          <tr>
            <td valign="middle"><b><?php echo $value->page; ?></b></td>
            <?php
				      if(isset($value->complete))
				      {
					      foreach (maybe_unserialize(base64_decode($value->complete)) as $param => $elem)
					      {
                  $reduced_elem = substr($elem,0, 50) . (strlen($elem) > 50 ? ' ...' : '');
						      echo "<td title=\"{$elem}\"><b>{$param}:</b></br> {$reduced_elem}  </td>";
					      }
			        }
				    ?>
            <td valign="middle" style="white-space:nowrap;"><b><?php echo __('Form Filled Out:', 'ecf') . "</br>" . $value->contact_time . ' ' . date('e') ?>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <div style="margin-top: 10%; font-style: italic; color: #555d66; font-size: 15px">
    <?php _e('For support or specific requests contact:', 'ecf'); ?> <a href="mailto:assistenza@wp-love.it">assistenza@wp-love.it</a>
  </div>
<?php } ?>
