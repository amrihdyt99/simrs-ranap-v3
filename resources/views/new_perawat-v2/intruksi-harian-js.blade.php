<script>
    const TV_KEY = '_tv'
    const GKP_KEY = '_gkp'

    const checkSupportLocalStorage = () => {
        if (typeof(Storage) !== "undefined") {
            return true
        } else {
            return false
        }
    }

    const getTvStorage = () => {
        if (!checkSupportLocalStorage()) {
            return
        }
        if (localStorage.getItem(TV_KEY) === null) {
            return {}
        } else {
            const data = JSON.parse(localStorage.getItem(TV_KEY))
            return data.data
        }
    }

    const getGkpStorage = () => {
        if (!checkSupportLocalStorage()) {
            return
        }
        if (localStorage.getItem(GKP_KEY) === null) {
            return {}
        } else {
            const data = JSON.parse(localStorage.getItem(GKP_KEY))
            return data
        }
    }

    const fetchTvData = async () => {
        const response = await fetch('{{ route("perawat.icu.intruks-harian.get-tanda-vital") }}'+`?reg_no={{ $reg }}&reg_medrec={{ $dataPasien->reg_medrec }}&date={{ date('Y-m-d') }}`)
        const result = await response.json()
        return result
    }

    const fetchGkpData = async () => {
        const response = await fetch('{{ route("perawat.icu.intruks-harian.get-gkp") }}'+`?reg_no={{ $reg }}&reg_medrec={{ $dataPasien->reg_medrec }}&date={{ date('Y-m-d') }}`)
        const result = await response.json()
        return result
    }

    const initTvStorage = async () => {
        if (!checkSupportLocalStorage()) {
            return
        }
        let unique = {
            reg_no: '{{ $reg }}',
            reg_medrec: '{{ $dataPasien->reg_medrec }}',
        }
        const data = await fetchTvData()
        if (data.status === 'success') {
            const tv = data.data.tanda_vital
            unique.data = JSON.parse(tv)
            localStorage.setItem(TV_KEY, JSON.stringify(unique))
        }
        if (localStorage.getItem(TV_KEY) === null) {
            console.log("localStorage not found");
            localStorage.setItem(TV_KEY, JSON.stringify({
                reg_no: '{{ $reg }}',
                reg_medrec: '{{ $dataPasien->reg_medrec }}',
                data: {}
            }))
        } else {
            const data = JSON.parse(localStorage.getItem(TV_KEY))
            const tv = data.data
            if (Object.keys(tv).length === 0) {
                console.log("localStorage empty");
                localStorage.setItem(TV_KEY, JSON.stringify({
                    reg_no: '{{ $reg }}',
                    reg_medrec: '{{ $dataPasien->reg_medrec }}',
                    data: {}
                }))
            } else {
                console.log("localStorage found");
                for (const key in tv) {
                    if (tv.hasOwnProperty(key)) {
                        const value = tv[key]
                        if (value === 1) {
                            $('#' + key).addClass('bg-success')
                        }
                    }
                }
            }
        }
    }

    const initGkpStorage = async () => {
        if (!checkSupportLocalStorage()) {
            return
        }
        let unique = {
            reg_no: '{{ $reg }}',
            reg_medrec: '{{ $dataPasien->reg_medrec }}',
        }
        const data = await fetchGkpData()
        if (data.status === 'success') {
            const gkp = JSON.parse(data.data.gkp)
            unique.gcs = gkp.gcs
            unique.kesadaran = gkp.kesadaran
            unique.pupil = gkp.pupil
            localStorage.setItem(GKP_KEY, JSON.stringify(unique))
        }
        if (localStorage.getItem(GKP_KEY) === null) {
            console.log("localStorage not found");
            localStorage.setItem(GKP_KEY, JSON.stringify({
                reg_no: '{{ $reg }}',
                reg_medrec: '{{ $dataPasien->reg_medrec }}',
                gcs: {},
                kesadaran: {},
                pupil: {},
            }))
        } else {
            const data = JSON.parse(localStorage.getItem(GKP_KEY))
            const gcs = data.gcs
            if (gcs !== undefined) {
                if (Object.keys(gcs).length === 0) {
                    localStorage.setItem(GKP_KEY, JSON.stringify({
                        reg_no: '{{ $reg }}',
                        reg_medrec: '{{ $dataPasien->reg_medrec }}',
                        gcs: {},
                    }))
                } else {
                    for (const key in gcs) {
                        if (gcs.hasOwnProperty(key)) {
                            const value = gcs[key]
                            if (value !== null) {
                                $('#' + key).val(value)
                            }
                        }
                    }
                }
            }
            const kesadaran = data.kesadaran
            if (kesadaran !== undefined) {
                if (Object.keys(kesadaran).length === 0) {
                    localStorage.setItem(GKP_KEY, JSON.stringify({
                        reg_no: '{{ $reg }}',
                        reg_medrec: '{{ $dataPasien->reg_medrec }}',
                        kesadaran: {},
                    }))
                } else {
                    for (const key in kesadaran) {
                        if (kesadaran.hasOwnProperty(key)) {
                            const value = kesadaran[key]
                            if (value !== null) {
                                $('#' + key).val(value)
                            }
                        }
                    }
                }
            }
            const pupil = data.pupil
            if (pupil !== undefined) {
                if (Object.keys(pupil).length === 0) {
                    localStorage.setItem(GKP_KEY, JSON.stringify({
                        reg_no: '{{ $reg }}',
                        reg_medrec: '{{ $dataPasien->reg_medrec }}',
                        pupil: {},
                    }))
                } else {
                    for (const key in pupil) {
                        if (pupil.hasOwnProperty(key)) {
                            const value = pupil[key]
                            if (value !== null) {
                                $('#' + key).val(value)
                            }
                        }
                    }
                }
            }
        }
    }
</script>

