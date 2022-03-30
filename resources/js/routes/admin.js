import addRecord  from  "../components/admin/addRecord";
import viewRecord from  "../components/admin/viewRecord";
import reviewedRecords from  "../components/admin/reviewedRecords";
import currencyConvertor from  "../components/admin/currencyConvertor";
import editRecord from "../components/admin/editRecord";
import addComments from "../components/admin/addComments";
import accessUsers from "../components/admin/accessUsers";
import getUserLevel from "../components/admin/getUserLevel";
import notedRecords from "../components/admin/notedRecords";
import allRecords from  "../components/admin/allRecords";
import systemReports from "../components/admin/systemReports";
import correctRecord from "../components/admin/correctRecord";

const routes = [
    {
        path : '/admin/addRecord',
        component : addRecord,
    },
    {
        path : '/admin/viewRecord/:id',
        component : viewRecord,
    },
    {
        path : '/admin/reviewedRecords',
        component : reviewedRecords,
    },
    {
        path : '/admin/currencyConvertor',
        component : currencyConvertor,
    },
    {
        path : '/admin/editRecord/:id',
        component : editRecord,
    },
    {
        path : '/admin/addComments/:id',
        component : addComments,
    },
    {
        path : '/admin/correctRecord/:id',
        component : correctRecord,
    },
    {
        path : '/admin/accessUsers',
        component : accessUsers
    },
    {
        path : '/admin/getUserLevel/:id',
        component: getUserLevel
    },
    {
        path : '/admin/notedRecords',
        component: notedRecords
    },
    {
        path : '/admin/allRecords',
        component: allRecords
    },
    {
        path : '/admin/systemReports',
        component: systemReports
    }
];


export default routes;
