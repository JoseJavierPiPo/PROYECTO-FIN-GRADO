import express, {Application} from 'express';
import userRoutes from '../routes/usuarios.routes';
import db from '../database/connection'
import cors from 'cors';

class Server {

    private app:Application;
    private port:string;
    private apiPaths = {
        usuarios: '/api/usuarios',
    }

    constructor(){

        this.app = express();
        this.middlewares();
        this.port = process.env.PORT || '8000';
        this.dbConnection();
        this.routes();

    }

    async dbConnection(){
        try{

            await db.authenticate();
            console.log('Database online...');

        } catch (error){

            console.error(error);


        }
    }



    middlewares(){
        this.app.use(cors());
        this.app.use(express.json());
        this.app.use(express.static('public'));
    
    }

    routes (){
        this.app.use(this.apiPaths.usuarios, userRoutes);
    }
    
    listen(){
        this.app.listen(this.port, ()=> {
            console.log(`Server is running on port ${this.port}`);

        });
    }

}

export default Server;