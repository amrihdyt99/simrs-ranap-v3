<div class="modal fade" id="createOrganizationModal" tabindex="-1" role="dialog" aria-labelledby="createOrganizationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createOrganizationModalLabel">Create Organization</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="createOrganizationForm" action="{{ route('master.organization.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="OrganizationCode">Organization Code</label>
                        <input type="text" name="OrganizationCode" id="OrganizationCode" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="OrganizationName">Organization Name</label>
                        <input type="text" name="OrganizationName" id="OrganizationName" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="OrganizationLevel">Organization Level</label>
                        <select name="OrganizationLevel" id="OrganizationLevel" class="form-control">
                            <option value="1">Level 1</option>
                            <option value="2">Level 2</option>
                            <option value="3">Level 3</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="ParentOrganization">Parent Organization</label>
                        <select name="ParentOrganization" id="ParentOrganization" class="form-control">
                            <option value="">Select Parent Organization</option>
                            {{-- @foreach($parentOrganizations as $organization)
                                <option value="{{ $organization->id }}">{{ $organization->OrganizationName }}</option>
                            @endforeach --}}
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="OrganizationPercentage">Organization Percentage</label>
                        <input type="number" name="OrganizationPercentage" id="OrganizationPercentage" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="createOrganizationButton" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
