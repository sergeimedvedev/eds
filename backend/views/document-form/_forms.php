<div class="form-group field-document-document_form required">
    <label class="control-label" for="document-document_form">Форма документа</label>
    <select id="document-document_form" class="form-control" name="Document[document_form]"
            onchange="getDocumentParamsByForm($(this))" aria-required="true">
        <option value="">- Выберите форму документа -</option>
        <?php foreach ($forms as $value => $option) { ?>
            <option value="<?= $value ?>"><?= $option ?></option>
        <?php } ?>
    </select>
</div>