<!-- Address Validation Modal -->
<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addressModalLabel">
                    <i class="fas fa-map-marker-alt me-2"></i> Validate Your Address
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="addressForm" method="POST" action="{{ route('address.store') }}">
                @csrf

                <div class="modal-body">
                    <div class="row">

                        {{-- Country (Fixed Nigeria) --}}
                        <div class="col-md-6 mb-3">
                            <label for="country" class="form-label">Country</label>
                            <select id="country" name="country" class="form-select" required>
                                <option value="Nigeria" selected>Nigeria</option>
                            </select>
                        </div>

                        {{-- State Selection --}}
                        <div class="col-md-6 mb-3">
                            <label for="state" class="form-label">State</label>
                            <select id="state" name="state" class="form-select" required>
                                <option value="">Select State</option>
                                @foreach(config('address.states', []) as $state => $lgas)
                                    <option value="{{ $state }}">{{ $state }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Please select a state</div>
                        </div>

                        {{-- LGA Selection --}}
                        <div class="col-md-6 mb-3">
                            <label for="lga" class="form-label">Local Government Area (LGA)</label>
                            <select id="lga" name="lga" class="form-select" required disabled>
                                <option value="">Select LGA</option>
                            </select>
                            <div class="invalid-feedback">Please select an LGA</div>
                            <div id="lgaLoading" class="spinner-border spinner-border-sm text-primary d-none" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>

                        {{-- Popular Address Suggestion --}}
                        <div class="col-md-6 mb-3">
                            <label for="popular_address" class="form-label">Popular Address (Suggestion)</label>
                            <select id="popular_address" name="popular_address" class="form-select" disabled>
                                <option value="">Select Popular Address or Enter Manually Below</option>
                            </select>
                            <div id="addressLoading" class="spinner-border spinner-border-sm text-primary d-none" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>

                        {{-- Manual Full Address --}}
                        <div class="col-12 mb-3">
                            <label for="full_address" class="form-label">Full Address (Manual Entry)</label>
                            <input type="text" class="form-control" id="full_address" name="full_address" 
                                   placeholder="Enter your full address manually if not listed" required>
                            <div class="invalid-feedback">Please provide a complete address</div>
                        </div>

                        {{-- House Number --}}
                        <div class="col-md-6 mb-3">
                            <label for="house_number" class="form-label">House Number/Name</label>
                            <input type="text" class="form-control" id="house_number" name="house_number" 
                                   placeholder="e.g., 23B or Sunshine Villa" required>
                            <div class="invalid-feedback">Please provide a house number or name</div>
                        </div>

                        {{-- Landmark --}}
                        <div class="col-md-6 mb-3">
                            <label for="landmark" class="form-label">Nearest Landmark</label>
                            <input type="text" class="form-control" id="landmark" name="landmark" 
                                   placeholder="e.g., Near City Mall, Opposite Police Station" required>
                            <div class="invalid-feedback">Please provide a nearby landmark</div>
                        </div>

                        {{-- Contact Number --}}
                        <div class="col-12 mb-3">
                            <label for="contact_number" class="form-label">Contact Number</label>
                            <div class="input-group">
                                <span class="input-group-text">+234</span>
                                <input type="tel" class="form-control" id="contact_number" name="contact_number" 
                                       placeholder="e.g., 8012345678" pattern="[0-9]{10}" required>
                            </div>
                            <div class="invalid-feedback">Please provide a valid 10-digit phone number</div>
                            <small class="text-muted">Enter your phone number without the leading 0</small>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Save Address
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>



@push('scripts')
@push('scripts')
<script>
    $(document).ready(function() {
        // Initialize form validation
        const addressForm = document.getElementById('addressForm');
        
        addressForm.addEventListener('submit', function(event) {
            event.preventDefault();
            if (!addressForm.checkValidity()) {
                event.stopPropagation();
                addressForm.classList.add('was-validated');
                return;
            }
            
            // Form is valid, submit via AJAX
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    // Show success message
                    alert('Address saved successfully!');
                    $('#addressModal').modal('hide');
                },
                error: function(xhr) {
                    // Show error message
                    alert('Error saving address: ' + xhr.responseJSON.message);
                }
            });
        }, false);

        // State change handler
        $('#state').change(function() {
            const state = $(this).val();
            const lgaSelect = $('#lga');
            
            if (!state) {
                lgaSelect.empty().append('<option value="">Select LGA</option>').prop('disabled', true);
                $('#popular_address').empty().append('<option value="">Select Popular Address or Enter Manually Below</option>').prop('disabled', true);
                return;
            }
            
            // Show loading indicator
            $('#lgaLoading').removeClass('d-none');
            lgaSelect.prop('disabled', true);
            
            // Fetch LGAs via AJAX
            $.ajax({
                url: `/address/lgas/${encodeURIComponent(state)}`,
                method: 'GET',
                success: function(data) {
                    lgaSelect.empty().append('<option value="">Select LGA</option>');
                    
                    if (data.lgas && data.lgas.length > 0) {
                        $.each(data.lgas, function(index, lga) {
                            lgaSelect.append(`<option value="${lga}">${lga}</option>`);
                        });
                    } else {
                        lgaSelect.append('<option value="" disabled>No LGAs found for this state</option>');
                    }
                    
                    lgaSelect.prop('disabled', false);
                },
                error: function(xhr) {
                    alert('Failed to load LGAs: ' + (xhr.responseJSON.error || 'Please try again'));
                    lgaSelect.append('<option value="" disabled>Error loading LGAs</option>');
                },
                complete: function() {
                    $('#lgaLoading').addClass('d-none');
                }
            });
        });
        
        // LGA change handler
        $('#lga').change(function() {
            const lga = $(this).val();
            const addressSelect = $('#popular_address');
            
            if (!lga) {
                addressSelect.empty().append('<option value="">Select Popular Address or Enter Manually Below</option>').prop('disabled', true);
                return;
            }
            
            // Show loading indicator
            $('#addressLoading').removeClass('d-none');
            addressSelect.prop('disabled', true);
            
            // Fetch popular addresses via AJAX
            $.ajax({
                url: `/address/popular-addresses/${encodeURIComponent(lga)}`,
                method: 'GET',
                success: function(data) {
                    addressSelect.empty().append('<option value="">Select Popular Address or Enter Manually Below</option>');
                    
                    if (data.addresses && data.addresses.length > 0) {
                        $.each(data.addresses, function(index, address) {
                            addressSelect.append(`<option value="${address}">${address}</option>`);
                        });
                    } else {
                        addressSelect.append('<option value="" disabled>No popular addresses found</option>');
                    }
                },
                error: function(xhr) {
                    alert('Failed to load popular addresses: ' + (xhr.responseJSON.error || 'Please try again'));
                    addressSelect.append('<option value="" disabled>Error loading addresses</option>');
                },
                complete: function() {
                    addressSelect.prop('disabled', false);
                    $('#addressLoading').addClass('d-none');
                }
            });
        });
        
        // Popular address selection handler
        $('#popular_address').change(function() {
            if ($(this).val()) {
                $('#full_address').val($(this).val()).trigger('input');
            }
        });
    });
</script>
@endpush