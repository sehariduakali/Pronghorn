<?php
/**
 * @file
 * services-documentation-method.tpl.php
 *
 * Template file for theming the documentation for a given Services method.
 *
 * Available custom variables:
 * - $anchor: a CSS anchor for this method.
 * - $name:
 * - $path:
 * - $weight:
 * - $verb:
 * - $description:
 * - $request_url: an example, fully formed request URL.
 * - $request_data: example data to POST along with request.
 * - $response: example response data.
 * - $errors: errors that may be returned
 * - $example_implementation_bundles:
 * - $method: the method array defined in hook_services_resources().
 * - $auth (boolean): indicates whether authentication is required.
 */
?>
<!-- services-documentation-method -->
<div class="resource-method">
  <a name="<?php print $anchor; ?>"></a>
  <?php if (!empty($path)): ?>
    <h4 class="method-title">
      <?php if (!empty($verb)): ?>
        <span class="uppercase method-verb"><?php print $verb; ?></span>
      <?php endif; ?>
      <span class="method-path"><?php print $path; ?></span>
      <?php if (!empty($auth)): ?>
        <span class="highlight pull-right">Authentication Required</span>
      <?php endif; ?>
    </h4>
  <?php elseif (!empty($name)): ?>
    <h4 class="method-title">
      <span class="method-name"><?php print $name; ?></span>
      <?php if (!empty($auth)): ?>
        <span class="highlight pull-right">Authentication Required</span>
      <?php endif; ?>
    </h4>
  <?php endif; ?>

  <?php if ($description): ?>
    <p class="method-description"><?php print $description; ?></p>
  <?php endif; ?>

  <?php if ($method && !empty($method['args'])): ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h5 class="panel-title">Arguments</h5>
      </div>

      <ul class="list-group">
        <?php foreach ($method['args'] as $argument): ?>
          <li class="list-group-item">
            <div class="argument-title pull-left">
              <em class="argument-type"><?php print $argument['type']; ?></em>
              <strong class="argument-key">
                <?php print $argument['name']; ?></strong>
              <span class="argument-source"><?php print $argument['http_method']; ?></span>
              <?php if ($argument['optional']): ?>
                <span class="argument-optional">(optional)</span>
              <?php endif; ?>
            </div>

            <div class="argument-description text-right">
              <?php print $argument['description']; ?>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <?php if (!empty($request_url)): ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h5 class="panel-title">Request Example</h5>
      </div>

      <div class="panel-body"><?php print $request_url; ?></div>

      <?php if (!empty($request_data)): ?>
        <pre class="panel-footer request-body no-bmargin no-border"><?php print $request_data; ?></pre>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($response)): ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h5 class="panel-title">Response Example</h5>
      </div>

      <pre class="panel-footer response-body no-bmargin no-border"><?php print $response; ?></pre>
    </div>
  <?php endif; ?>

  <?php if ($errors): ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h5 class="panel-title">Errors</h5>
      </div>

      <ul class="list-group">
        <?php foreach ($errors as $error): ?>
          <li class="list-group-item"><?php print render($error); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <?php if ($example_implementations_bundles): ?>
    <div class="implementations">
    <h5 class="implementations-title">Implementation Examples</h5>
      <?php foreach ($example_implementations_bundles as $example_implementations_bundle): ?>
        <?php print render($example_implementations_bundle); ?>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

</div>
<!-- /services-documentation-method -->
