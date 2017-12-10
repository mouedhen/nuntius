import {fetchAll, fetchOne, createOne, updateOne, deleteOne, saveOne} from "../../core/actions";
import {FETCH_JOBS, FETCH_JOB, CREATE_JOB, UPDATE_JOB, DELETE_JOB} from "./mutation-types";

const defaultUri = 'jobs';

export function fetchJobs({commit}) {
    return fetchAll({commit}, defaultUri, FETCH_JOBS)
}

export function fetchJob({commit}, jobID) {
    return fetchOne({commit}, jobID, defaultUri, FETCH_JOB)
}

export function createJob({commit}, job) {
    return createOne({commit}, job, defaultUri, CREATE_JOB)
}

export function updateJob({commit}, job) {
    return updateOne({commit}, job, defaultUri, UPDATE_JOB)
}

export function deleteJob({commit}, jobID) {
    return deleteOne({commit}, jobID, defaultUri, DELETE_JOB)
}

export function saveJob({commit, state}, {job}) {
    return saveOne({commit, state}, {data: job}, defaultUri, CREATE_JOB, UPDATE_JOB)
}
