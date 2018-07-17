<form method="POST" action="{{ route('domains.store') }}">
    <h3>Analyzer SEO</h3>
    <div class="form-group">
        <input class="form-control" type="text" placeholder="http://exemple.com" name="name">
        <small id="emailHelp" class="form-text text-muted">Add a website to analyze</small>
    </div>
    <button type="submit" class="btn btn-primary" name="addDomains">Submit</button>
</form>
