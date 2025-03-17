@props(['destinations', 'services'])

<!-- SIDEBAR -->
<aside id="sidebar" class="col-lg-4">
    <x-sidebar-category-section title="Our Services: " :values="$services" route="page.service.details" name="title" />
    <x-sidebar-category-section title="Study Abroad: " :values="$destinations" value_prefix="Study in "
        route="page.abroad.details" />
</aside>
<!-- END SIDEBAR -->
