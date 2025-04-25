import { LoginForm } from "../components/auth/login.jsx";
import { AuthLayout } from "../components/auth/AuthLayout.jsx";

export default function LoginPage() {
  return (
    <AuthLayout>
      <LoginForm />
    </AuthLayout>
  );
}