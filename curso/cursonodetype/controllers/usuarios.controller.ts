import { Request, Response } from 'express';
import Usuario from '../models/usuario';

export const getUsuarios = async (req: Request, res: Response) => {
    const usuarios = await Usuario.findAll({
        attributes:{exclude : ['password']}
    });
    res.json(usuarios);
};

export const getUsuario = async (req: Request, res: Response) => {

    const { id } = req.params;

    const usuario = await Usuario.findByPk(id,{
        attributes:{exclude : ['password']}
    }); 

    res.json(usuario || { msg: 'Usuario no encontrado' });

};

export const postUsuario = async (req: Request, res: Response) => { 
    try {
        const usuario = await Usuario.create(req.body);
        res.json(usuario);
    } catch (error) {
        res.status(500).json({ error: 'Error al crear usuario' });
    }
};

export const putUsuario = async (req: Request, res: Response) => { 
    const { id } = req.params;
    await Usuario.update(req.body, { where: { id } }); 
    res.json({ msg: 'Usuario actualizado' });
};


export const deleteUsuario = async (req: Request, res: Response) => { 
    const { id } = req.params;
    await Usuario.destroy({ where: { id } });
    res.json({ msg: 'Usuario eliminado' });
};