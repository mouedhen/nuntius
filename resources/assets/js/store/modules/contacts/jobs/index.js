import * as actions from './actions'
import * as getters from './getters'

import {
    FETCH_JOBS,
    FETCH_JOB,
    CREATE_JOB,
    UPDATE_JOB,
    DELETE_JOB
} from './mutation-types'

const initialState = {
    all: [],
};

const mutations = {
    [FETCH_JOBS] (state, jobs) {
        state.all = jobs
    },

    [FETCH_JOB] (state, job) {
        const index = state.all.findIndex(x => x.id === job.id);
        if (index === -1) {
            state.all.push(job)
        } else {
            state.all.splice(index, 1, job)
        }
    },

    [CREATE_JOB] (state, job) {
        state.all.push(job)
    },

    [UPDATE_JOB] (state, job) {
        const index = state.all.findIndex(x => x.id === job.id);
        if (index !== -1) {
            state.all.splice(index, 1, job)
        }
    },

    [DELETE_JOB] (state, jobID) {
        state.all = state.all.features.filter(x => x.id !== jobID)
    }
};

export default {
    state: { ...initialState },
    actions,
    getters,
    mutations
}
