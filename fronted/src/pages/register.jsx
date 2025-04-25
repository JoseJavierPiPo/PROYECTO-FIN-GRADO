// src/pages/Register.jsx
import { RegisterForm } from "../components/auth/registerform.jsx"
import { AuthLayout } from "../components/auth/AuthLayout.jsx"

export function Register() {
  return (
    <AuthLayout>
      <RegisterForm />
    </AuthLayout>
  )
}