<!-- Edit Modal HTML -->
<div class="modal fade" id="editOrganizationModal" tabindex="-1" role="dialog" aria-labelledby="editOrganizationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editOrganizationModalLabel">Edit Organization</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editOrganizationForm" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="editOrganizationId">
                <div class="modal-body">
                    <!-- Form Fields Here -->
                    <div class="form-group">
                        <label for="editOrganizationCode">Organization Code</label>
                        <input type="text" name="OrganizationCode" id="editOrganizationCode" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="editOrganizationName">Organization Name</label>
                        <input type="text" name="OrganizationName" id="editOrganizationName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="editOrganizationLevel">Organization Level</label>
                        <select name="OrganizationLevel" id="editOrganizationLevel" class="form-control">
                            <option value="1">Level 1</option>
                            <option value="2">Level 2</option>
                            <option value="3">Level 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editParentOrganization">Parent Organization</label>
                        <select name="ParentOrganization" id="editParentOrganization" class="form-control">
                            <option value="">Select Parent Organization</option>
                            {{-- @foreach($parentOrganizations as $organization)
                                <option value="{{ $organization->id }}">{{ $organization->OrganizationName }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editOrganizationPercentage">Organization Percentage</label>
                        <input type="number" name="OrganizationPercentage" id="editOrganizationPercentage" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
